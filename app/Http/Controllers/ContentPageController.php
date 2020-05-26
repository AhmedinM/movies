<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Serie;
use App\Episode;
use App\Season;
use App\Genre;
use App\Comment;
use App\Subcomment;
use App\MovieReview;
use App\SerieReview;
use App\Reaction;
use App\Subreaction;
use App\Report;
use App\Subreport;
use App\MovieReport;
use App\EpisodeReport;
use App\Playlist;
use App\PlaylistSerie;
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

            if(count($movie->genres)<=0){
                $movie->recommend = [];
            }else{
                $movie->recommend = $movie->genres[0]->movies()->take(6)->get();
            }

            $movie->comments = $movie->comments()->latest()->get();
            foreach($movie->comments as $com){
                $com->user = $com->user()->get();
                $com->likes = DB::table('reactions')->where('comment_id',$com->id)->where('type',1)->count();
                $com->disslikes = DB::table('reactions')->where('comment_id',$com->id)->where('type',0)->count();
            }
            $movie->reviews = $movie->reviews()->latest()->get();
            foreach($movie->reviews as $com){
                $com->user = $com->user()->get();
            }
            
            $user = Auth::user();
            if($user!==null){
                $movie->premium = DB::table('premia')->where('user_id',$user->id)->first();
            }else{
                $movie->premium = null;
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

    public function movieReview(Request $request){
        $this->validate($request,[
            'text' => 'required',
            'title' => 'required',
            'hid' => 'required'
        ]);

        $userId = Auth::id();
        $movieId = intval($request->hid);
        $title = $request->title;
        $text = $request->text;
        $rate = $request->mark;

        $r = new MovieReview;
        $r->user_id = $userId;
        $r->movie_id = $movieId;
        $r->title = $title;
        $r->description = $text;
        $t->rate = $rate;
        $r->save();

        return redirect()->back();
    }



    public function serie($id, $epId){
        $serie = Serie::find($id);
        if($serie!==null){
            $serie->genres = $serie->genres()->get();

            if(count($serie->genres)<=0){
                $serie->recommend = [];
            }else{
                $serie->recommend = $serie->genres[0]->series()->take(6)->get();
            }

            $serie->comments = $serie->comments()->latest()->get();
            foreach($serie->comments as $com){
                $com->user = $com->user()->get();
                $com->likes = DB::table('subreactions')->where('subcomment_id',$com->id)->where('type',1)->count();
                $com->disslikes = DB::table('subreactions')->where('subcomment_id',$com->id)->where('type',0)->count();
            }
            $serie->reviews = $serie->reviews()->latest()->get();
            foreach($serie->reviews as $com){
                $com->user = $com->user()->get();
            }
            
            $user = Auth::user();
            if($user!==null){
                $serie->premium = DB::table('premia')->where('user_id',$user->id)->first();
            }else{
                $serie->premium = null;
            }

            if(!isset($epId)){
                $p = Season::where('serie_id',$id)->first();
                $serie->episode = Episode::where('season_id',$p->id)->orderBy('number','ASC')->first();
            }else{
                $serie->episode = Episode::find($epId);
                if($serie->episode==null){
                    $p = Season::where('serie_id',$id)->first();
                    $serie->episode = Episode::where('season_id',$p->id)->orderBy('number','ASC')->first();
                }
                $serie->episode->captions = $serie->episode->episodeCaptions()->get();
            }

            $serie->seasons = $serie->seasons()->orderBy('number','ASC')->get();
            foreach($serie->seasons as $season){
                $season->episodes = $season->episodes()->orderBy('number','ASC')->get();
            }
            return view('series')->with('serie',$serie);
        }else{
            abort(404);
        }
    }

    public function serieComment(Request $request){
        $this->validate($request,[
            'text' => 'required',
            'hid' => 'required'
        ]);
        $userId = Auth::id();
        $serieId = intval($request->hid);
        $text = $request->text;
        $c = new Subcomment;
        $c->user_id = $userId;
        $c->serie_id = $serieId;
        $c->text = $text;
        $c->save();

        return redirect()->back();
    }

    public function serieReview(Request $request){
        $this->validate($request,[
            'text' => 'required',
            'title' => 'required',
            'hid' => 'required'
        ]);

        $userId = Auth::id();
        $serieId = intval($request->hid);
        $title = $request->title;
        $text = $request->text;
        $rate = intval($request->mark);
        
        $p1 = Serie::find($serieId);
        $p2 = SerieReview::where('serie_id',$serieId)->count();
        $p3 = $p1->rate*$p2;

        $old = SerieReview::where('user_id',$userId)->where('serie_id',$serieId)->first();
        if($old!=null){
            SerieReview::where('user_id',$userId)->where('serie_id',$serieId)->delete();
            $p3 = $p3-$old->rate;
            $p2--;
        }

        $p3 = $p3+$rate;
        $p2++;
        $p3 = $p3/$p2;
        $p1->rate = $p3;
        $p1->save();

        $r = new SerieReview;
        $r->user_id = $userId;
        $r->serie_id = $serieId;
        $r->title = $title;
        $r->description = $text;
        $r->rate = $rate;
        $r->save();

        return redirect()->back();
    }

    public function likeComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            $comment = Comment::where('id',$request->commentId)->first();
            Reaction::where('user_id',$user)->where('comment_id',$request->commentId)->delete();
            $r = new Reaction;
            $r->user_id = $user;
            $r->comment_id = $request->commentId;
            $r->type = 1;
            $r->save();

            $l = Reaction::where('comment_id',$request->commentId)->where('type',1)->count();
            $d = Reaction::where('comment_id',$request->commentId)->where('type',0)->count();
            $c = [$l,$d];
            //echo $c;
            return $c;
            exit();
        }else{
            exit();
        }
    }

    public function unlikeComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            $comment = Comment::where('id',$request->commentId)->first();
            Reaction::where('user_id',$user)->where('comment_id',$request->commentId)->delete();
            $r = new Reaction;
            $r->user_id = $user;
            $r->comment_id = $request->commentId;
            $r->type = 0;
            $r->save();

            $l = Reaction::where('comment_id',$request->commentId)->where('type',1)->count();
            $d = Reaction::where('comment_id',$request->commentId)->where('type',0)->count();
            $c = [$l,$d];
            //echo $c;
            return $c;
            exit();
        }else{
            exit();
        }
    }

    public function reportComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            Report::where('user_id',$user)->where('comment_id',$request->commentId)->delete();

            $r = new Report;
            $r->user_id = $user;
            $r->comment_id = $request->commentId;
            $r->save();

            return 1;
        }else{
            return 0;
        }
    }

    public function reportMovie(Request $request){
        $user = Auth::id();
        if($user!=null){
            MovieReport::where('user_id',$user)->where('movie_id',$request->id)->delete();

            $r = new MovieReport;
            $r->user_id = $user;
            $r->movie_id = $request->id;
            $r->save();

            return 1;
        }else{
            return 0;
        }
    }
    
    public function playlist(Request $request){
        $user = Auth::id();
        if($user!=null){
            Playlist::where('user_id',$user)->where('movie_id',$request->id)->delete();

            $p = new Playlist;
            $p->user_id = $user;
            $p->movie_id = $request->id;
            $p->save();

            return 1;
        }else{
            return 0;
        }
    }

    public function likeSerieComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            $comment = Subcomment::where('id',$request->commentId)->first();
            Subreaction::where('user_id',$user)->where('subcomment_id',$request->commentId)->delete();
            $r = new Subreaction;
            $r->user_id = $user;
            $r->subcomment_id = $request->commentId;
            $r->type = 1;
            $r->save();

            $l = Subreaction::where('subcomment_id',$request->commentId)->where('type',1)->count();
            $d = Subreaction::where('subcomment_id',$request->commentId)->where('type',0)->count();
            $c = [$l,$d];

            return $c;
            exit();
        }else{
            exit();
        }
    }

    public function unlikeSerieComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            $comment = Subcomment::where('id',$request->commentId)->first();
            Subreaction::where('user_id',$user)->where('subcomment_id',$request->commentId)->delete();
            $r = new Subreaction;
            $r->user_id = $user;
            $r->subcomment_id = $request->commentId;
            $r->type = 0;
            $r->save();

            $l = Subreaction::where('subcomment_id',$request->commentId)->where('type',1)->count();
            $d = Subreaction::where('subcomment_id',$request->commentId)->where('type',0)->count();
            $c = [$l,$d];
            
            return $c;
            exit();
        }else{
            exit();
        }
    }

    public function reportSerieComment(Request $request){
        $user = Auth::id();
        if($user!=null){
            Subreport::where('user_id',$user)->where('subcomment_id',$request->commentId)->delete();

            $r = new Subreport;
            $r->user_id = $user;
            $r->subcomment_id = $request->commentId;
            $r->save();

            return 1;
        }else{
            return 0;
        }
    }

    public function reportEpisode(Request $request){
        $user = Auth::id();
        if($user!=null){
            EpisodeReport::where('user_id',$user)->where('episode_id',$request->id)->delete();

            $r = new EpisodeReport;
            $r->user_id = $user;
            $r->episode_id = $request->id;
            $r->save();

            return 1;
        }else{
            return 0;
        }
    }

    public function playlistEpisode(Request $request){
        $user = Auth::id();
        if($user!=null){
            PlaylistSerie::where('user_id',$user)->where('episode_id',$request->id)->delete();

            $p = new PlaylistSerie;
            $p->user_id = $user;
            $p->episode_id = $request->id;
            $p->save();

            return 1;
        }else{
            return 0;
        }
    }
}
