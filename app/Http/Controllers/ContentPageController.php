<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Genre;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public function movie($id){
        $movie = Movie::find($id);
        if($movie!==null){
            $movie->genres = $movie->genres()->get();
            $movie->captions = $movie->movieCaptions()->get();
            try{
                $movie->recommend = $movie->genres[0]->movies()->take(6)->get();
            }catch(Exception $e){
                $movie->recommend = [];
            }
            $movie->comments = $movie->comments()->latest()->get();
            foreach($movie->comments as $com){
                $com->user = $com->user()->get();
                $com->likes = DB::table('reactions')->where('comment_id',$com->id)->where('type',1)->count();
                $com->disslikes = DB::table('reactions')->where('comment_id',$com->id)->where('type',0)->count();
            }
            
            return view('movie')->with('movie',$movie);
            //return $movie;
        }else{
            abort(404);
        }
    }

    public function movieComment(Request $request){
        $this->validate($request,[
            'text' => 'required',
            'hid' => 'required'
        ]);
        $userId = Auth::id();
        $movieId = intval($request->hid);
        $text = $request->text;
        $c = new Comment;
        $c->user_id = $userId;
        $c->movie_id = $movieId;
        $c->text = $text;
        $c->save();

        return redirect()->back();
    }
}
