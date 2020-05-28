<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Admin;
use App\User;
use App\Premium;
use App\Comment;
use App\Subcomment;
use App\MovieReview;
use App\SerieReview;
use App\Report;
use App\Subreport;
use App\MovieReport;
use App\EpisodeReport;
use App\Movie;
use App\Serie;
use App\Episode;
use App\Season;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        //$this->middleware('verified');
        //$this->middleware('check_verification');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        //statistika
        $adminNum = Admin::count();
        $userNum = User::count();
        $premiumNum = Premium::count();
        $commentNum1 = Comment::count();
        $commentNum2 = Subcomment::count();
        $reviewNum1 = MovieReview::count();
        $reviewNum2 = SerieReview::count();
        $reportNum1 = Report::count();
        $reportNum2 = Subreport::count();
        $reportNum3 = MovieReport::count();
        $reportNum4 = EpisodeReport::count();
        $viewNum1 = Movie::sum('views');
        $viewNum2 = Episode::sum('views');

        $rateNum1 = Movie::count();
        $rateNum2 = Serie::count();
        $rateVal1 = Movie::sum('rate');
        $rateVal2 = Serie::sum('rate');

        $grm = Movie::orderBy('rate','desc')->first();
        $grs = Serie::orderBy('rate','desc')->first();
        if($grm<$grs){
            $data['bestRate'] = $grs;
        }else{
            $data['bestRate'] = $grm;
        }

        $gvm = Movie::orderBy('views','desc')->first();
        $gve = Episode::orderBy('views','desc')->first();
        if($gvm<$gve){
            $data['mostViews'] = $gve;
        }else{
            $data['mostViews'] = $gvm;
        }

        $data['admins'] = $adminNum;
        $data['users'] = $userNum;
        $data['premiums'] = $premiumNum;
        $data['comments'] = $commentNum1+$commentNum2;
        $data['reviews'] = $reviewNum1+$reviewNum2;
        $data['reports'] = $reportNum1+$reportNum2+$reportNum3+$reportNum4;
        $data['views'] = $viewNum1+$viewNum2;

        $data['rate'] = round(($rateVal1+$rateVal2)/($rateNum1+$rateNum2),2);

        //korisnici sa najvise komentara i 
        $users = User::get();
        foreach($users as $u){
            $comments1 = Comment::where('user_id',$u->id)->get();
            $comments2 = Subcomment::where('user_id',$u->id)->get();

            $c1 = count($comments1);
            $c2 = count($comments2);

            $u->comm = $c1+$c2;
        }
        $g1 = null;
        $g2 = null;
        foreach($users as $u){
            if($u->comm>$g2){
                $g1 = $u;
                $g2 = $u->comm;
            }
        }
        $data['userComm'] = $g1;

        $users2 = User::get();
        foreach($users2 as $u){
            $reviews1 = MovieReview::where('user_id',$u->id)->get();
            $reviews2 = SerieReview::where('user_id',$u->id)->get();

            $r1 = count($reviews1);
            $r2 = count($reviews2);

            $u->rev = $r1+$r2;
        }
        $g1 = null;
        $g2 = null;
        foreach($users2 as $u){
            if($u->rev>$g2){
                $g1 = $u;
                $g2 = $u->rev;
            }
        }
        $data['userRev'] = $g1;

        return view('admin.panel')->with('data',$data);
    }

    public function loadAdmin(){
        return view('admin.newAdmin');
    }

    public function addAdmin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|same:confirmPassword',
            'confirmPassword' => 'required'
        ]);

        $admin = new Admin;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();
        
        $msg = "Novi admin je uspješno unijet!";
        return redirect()->back()->withErrors([$msg]);
    }
}
