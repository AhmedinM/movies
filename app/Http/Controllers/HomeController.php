<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

use App\Movie;
use App\Serie;
use App\Episode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth' => 'verified']);
        //$this->middleware('verified');
        $this->middleware('check_verification');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data1 = DB::table('movies')->latest()->limit(12)->get();
        $data2 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
        ->join('series','seasons.serie_id','series.id')
        ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
        ->latest()->limit(12)->get();

        $d1 = json_decode($data1,true);
        foreach($d1 as $d){
            $dat = DB::table('content_genres')->where('movie_id',$d['id'])
            ->join('genres','genres.id','content_genres.genre_id')
            ->select('genres.name as genre_name')->get();
            $d3[] = json_decode($dat,true);
        }
        $d2 = json_decode($data2,true);
        foreach($d2 as $d){
            $dat = DB::table('series_genres')->where('serie_id',$d['seriesId'])
            ->join('genres','genres.id','series_genres.genre_id')
            ->select('genres.name as genre_name')->get();
            $d4[] = json_decode($dat,true);
        }
        $data[0] = $d1;
        $data[1] = $d2;
        $data[2] = $d3;
        $data[3] = $d4;



        $data1 = DB::table('movies')->orderBy('views','desc')->limit(3)->get();
        $data2 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
        ->join('series','seasons.serie_id','series.id')
        ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
        ->orderBy('views','desc')->limit(3)->get();

        $d1 = json_decode($data1,true);
        foreach($d1 as $d){
            $dat = DB::table('content_genres')->where('movie_id',$d['id'])
            ->join('genres','genres.id','content_genres.genre_id')
            ->select('genres.name as genre_name')->get();
            $d3[] = json_decode($dat,true);
        }
        $d2 = json_decode($data2,true);
        foreach($d2 as $d){
            $dat = DB::table('series_genres')->where('serie_id',$d['seriesId'])
            ->join('genres','genres.id','series_genres.genre_id')
            ->select('genres.name as genre_name')->get();
            $d4[] = json_decode($dat,true);
        }
        $data[4] = $d1;
        $data[5] = $d2;
        $data[6] = $d3;
        $data[7] = $d4;

        //return $data;
        return view('home')->with('data',$data);
    }

    public function catalogM(){
        $data1 = DB::table('movies')->orderBy('title','asc')->paginate(3);
        $d2 = DB::table('content_genres')->join('genres','genres.id','content_genres.genre_id')
        ->select('genres.name as genre_name','content_genres.movie_id as genre_movie_id')->get();

        $data2 = DB::table('movies')->orderBy('views','desc')->limit(3)->get();
        $data3 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
        ->join('series','seasons.serie_id','series.id')
        ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
        ->orderBy('views','desc')->limit(3)->get();

        $data[0] = $data1;
        $data[1] = $d2;
        $data[2] = $data2;
        $data[3] = $data3;
        $data[4] = 0;

        $data[5] = DB::table('genres')->orderBy('name','ASC')->get();

        return view('catalog')->with('data',$data);
        //return $data;
    }

    public function catalogS(){
        $data1 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
        ->join('series','seasons.serie_id','series.id')
        ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
        ->orderBy('title','asc')->paginate(3);
        $d2 = DB::table('series_genres')->join('genres','genres.id','series_genres.genre_id')
        ->select('genres.name as genre_name','series_genres.serie_id as genre_movie_id')->get();

        $data2 = DB::table('movies')->orderBy('views','desc')->limit(3)->get();
        $data3 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
        ->join('series','seasons.serie_id','series.id')
        ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
        ->orderBy('views','desc')->limit(3)->get();

        $data[0] = $data1;
        $data[1] = $d2;
        $data[2] = $data2;
        $data[3] = $data3;
        $data[4] = 1;

        $data[5] = DB::table('genres')->orderBy('name','ASC')->get();

        return view('catalog')->with('data',$data);
    }

    public function profile(){
        $user = Auth::user();
        return view('profile')->with('user',$user);
    }

    public function watched(){
        $movies = Movie::orderBy('views','DESC')->take(50)->get();
        foreach($movies as $mov){
            $mov->genres = $mov->genres()->get();
        }
        $episodes = Episode::orderBy('views','DESC')->take(50)->get();
        foreach($episodes as $ep){
            $ep->season = $ep->season()->with('serie')->get();
            $ep->genres = $ep->season[0]->serie->genres()->get();
        }
        $data = [$movies, $episodes];

        return view('top')->with('data',$data);
        //return $data;
    }

    public function rated(){
        $movies = Movie::orderBy('rate','DESC')->take(50)->get();
        foreach($movies as $mov){
            $mov->genres = $mov->genres()->get();
        }
        $series = Serie::orderBy('rate','DESC')->take(50)->get();
        foreach($series as $ser){
            $ser->genres = $ser->genres()->get();
        }
        $data = [$movies, $series];
        
        return view('topRated')->with('data',$data);
        //return $data;
    }

    public function offer(){
        $user = Auth::user();
        if($user!==null){
            $premium = DB::table('premia')->where('user_id',$user->id)->first();
        }else{
            $premium = null;
        }

        return view('offer')->with('premium',$premium);
    }

    public function search(Request $request){
        $this->validate($request,[
            'srch' => 'required',
        ]);

        $s = $request->srch;
        
        $data[0] = Movie::where('title','LIKE','%'.$s.'%')->get();
        foreach($data[0] as $mov){
            $mov->genres = $mov->genres()->get();
        }
        $data[1] = Serie::where('title','LIKE','%'.$s.'%')->get();
        foreach($data[1] as $mov){
            $mov->genres = $mov->genres()->get();
        }
        $data[2] = Episode::where('title','LIKE','%'.$s.'%')->get();
        foreach($data[2] as $ep){
            $ep->season = $ep->season()->with('serie')->get();
            $ep->genres = $ep->season[0]->serie->genres()->get();
        }

        return view('search')->with('data',$data);
        //return $data;
    }

    public function filter(Request $request){
        if($request->type==1){
            $data1 = DB::table('episodes')->where('year','>=',$request->mark3)->where('year','<=',$request->mark4)->where('rate','>=',$request->mark)->where('rate','<=',$request->mark2)->join('seasons','episodes.season_id','seasons.id')
            ->join('series','seasons.serie_id','series.id')
            ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
            ->join('series_genres','series_genres.serie_id','series.id')->join('genres','genres.id','series_genres.genre_id')
            ->select('genres.id as genre_id','episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')->where('genre_id',$request->genre)
            ->orderBy('series.title','asc')->paginate(3);
            $d2 = DB::table('series_genres')->join('genres','genres.id','series_genres.genre_id')
            ->select('genres.name as genre_name','series_genres.serie_id as genre_movie_id')->get();

            $data2 = DB::table('movies')->orderBy('views','desc')->limit(3)->get();
            $data3 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
            ->join('series','seasons.serie_id','series.id')
            ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
            ->orderBy('views','desc')->limit(3)->get();

            $data[0] = $data1;
            $data[1] = $d2;
            $data[2] = $data2;
            $data[3] = $data3;
            $data[4] = 1;

            $data[5] = DB::table('genres')->orderBy('name','ASC')->get();

            return view('catalog')->with('data',$data);
            //return $data;
        }else{
            $data1 = DB::table('movies')->where('year','>=',$request->mark3)->where('year','<=',$request->mark4)->where('rate','>=',$request->mark)->where('rate','<=',$request->mark2)->orderBy('title','asc')->
            join('content_genres','content_genres.movie_id','movies.id')->join('genres','genres.id','content_genres.genre_id')
            ->select('movies.*','genres.id as genre_id')->where('genre_id',$request->genre)->paginate(3);
            $d2 = DB::table('content_genres')->join('genres','genres.id','content_genres.genre_id')
            ->select('genres.name as genre_name','content_genres.movie_id as genre_movie_id')->get();

            $data2 = DB::table('movies')->orderBy('views','desc')->limit(3)->get();
            $data3 = DB::table('episodes')->join('seasons','episodes.season_id','seasons.id')
            ->join('series','seasons.serie_id','series.id')
            ->select('episodes.*','series.id as seriesId','series.title as seriesTitle','series.description','series.picture','series.rate')
            ->orderBy('views','desc')->limit(3)->get();

            $data[0] = $data1;
            $data[1] = $d2;
            $data[2] = $data2;
            $data[3] = $data3;
            $data[4] = 0;

            $data[5] = DB::table('genres')->orderBy('name','ASC')->get();

            return view('catalog')->with('data',$data);
            //return $data;
        }
    }
}
