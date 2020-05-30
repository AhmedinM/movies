<?php

namespace App\Http\Controllers;

use App\User;
use App\Premium;
use App\Comment;
use App\Subcomment;
use App\Report;
use App\Subreport;
use App\Admin;
use App\MovieReport;
use App\EpisodeReport;
use App\Movie;
use App\Serie;
use App\Episode;
use App\Season;
use App\Genre;
use App\ContentGenre;
use App\MovieCaption;
use App\EpisodeCaption;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.redirect');
        //$this->middleware('auth:admin');
    }

    public function loadMovie(){
        $genres = Genre::orderBy('name')->get();
        return view('admin.movie')->with('genres',$genres);
    }

    public function loadSerie(){
        $genres = Genre::orderBy('name')->get();
        return view('admin.serie')->with('genres',$genres);
    }

    public function loadSeason(){
        $series = Serie::orderBy('id','ASC')->get();
        return view('admin.season')->with('series',$series);
    }

    public function loadEpisode(){
        $seasons = Season::orderBy('id','ASC')->with('serie')->get();
        return view('admin.episode')->with('seasons',$seasons);;
    }

    public function loadMovieCaption(){
        $movies = Movie::orderBy('id','ASC')->get();
        return view('admin.movieCaption')->with('movies',$movies);
    }

    public function loadSerieCaption(){
        $episodes = Episode::orderBy('id','ASC')->with('season')->get();
        foreach($episodes as $e){
            $e->serie = $e->season->serie()->first();
        }
        return view('admin.serieCaption')->with('episodes',$episodes);
    }

    public function addMovie(Request $request){
        $this->validate($request,[
            'description' => 'required',
            'title' => 'required',
            'year' => 'required|numeric',
            'duration' => 'required|numeric',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required',
            'video'  => 'mimes:mp4,mov,ogg,qt',
        ]);

        $nameP = time().'.'.$request->picture->extension();
        $request->picture->move(public_path('movies'), $nameP);

        $nameV = time().'.'.$request->video->extension();  
        $request->video->move(public_path('videos'), $nameV);

        $movie = new Movie;
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->year = $request->year;
        $movie->duration = $request->duration;
        $movie->country = $request->country;
        $movie->picture = 'movies/'.$nameP;
        $movie->video = 'videos/'.$nameV;
        $movie->rate = 0;
        $movie->views = 0;

        $movie->save();

        foreach($request->genres as $gId){
            $genre = new ContentGenre;
            $genre->genre_id = $gId;
            $genre->movie_id = $movie->id;
            $genre->save();
        }
        
        $msg = "Film je uspješno unijet!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function addSerie(Request $request){
        $this->validate($request,[
            'description' => 'required',
            'title' => 'required',
            'year' => 'required|numeric',
            'duration' => 'required|numeric',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required',
        ]);

        $name = time().'.'.$request->picture->extension();
        $request->picture->move(public_path('series'), $name);

        $serie = new Serie;
        $serie->title = $request->title;
        $serie->description = $request->description;
        $serie->year = $request->year;
        $serie->duration = $request->duration;
        $serie->country = $request->country;
        $serie->picture = 'series/'.$name;
        $serie->rate = 0;

        $serie->save();

        foreach($request->genres as $gId){
            DB::table('series_genres')->insert(
                array('serie_id' => $serie->id,
                      'genre_id' => $gId)
            );
        }
        
        $msg = "Serija je uspješno unijeta!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function addSeason(Request $request){
        $this->validate($request,[
            'number' => 'required|numeric',
        ]);

        $season = new Season;
        $season->number = $request->number;
        $season->serie_id = $request->serie;

        $season->save();
        
        $msg = "Sezona je uspješno unijeta!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function addEpisode(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'number' => 'required|numeric',
            'video'  => 'mimes:mp4,mov,ogg,qt',
        ]);

        $name = time().'.'.$request->video->extension();  
        $request->video->move(public_path('videos'), $name);

        $episode = new Episode;
        $episode->title = $request->title;
        $episode->number = $request->number;
        $episode->video = 'videos/'.$name;
        $episode->views = 0;
        $episode->season_id = $request->season;

        $episode->save();
        
        $msg = "Epizoda je uspješno unijeta!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function addMovieCaption(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short' => 'required',
            'file' => 'required',
        ]);

        $name = time().'.vtt';  
        $request->file->move(public_path('captions'), $name);

        $mc = new MovieCaption;
        $mc->title = $request->title;
        $mc->short = $request->short;
        $mc->file = 'captions/'.$name;
        $mc->movie_id = $request->movie;

        $mc->save();
        
        $msg = "Prevod filma je uspješno unijet!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function addSerieCaption(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'short' => 'required',
            'file' => 'required',
        ]);

        $name = time().'.vtt';  
        $request->file->move(public_path('captions'), $name);

        $ec = new EpisodeCaption;
        $ec->title = $request->title;
        $ec->short = $request->short;
        $ec->file = 'captions/'.$name;
        $ec->episode_id = $request->episode;

        $ec->save();
        
        $msg = "Prevod epizode je uspješno unijet!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function loadUsers(){
        $users = User::orderBy('name','ASC')->with('premium')->paginate(1);
        return view('admin.users')->with('users',$users);
        //return $users;
    }

    public function loadPremiums(){
        $premiums = Premium::with('user')->paginate(1);
        return view('admin.premiums')->with('premiums',$premiums);
        //return $premiums;
    }

    public function removeUser($id){
        Premium::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        $msg = "Korisnik je uspješno ulonjen!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function removePremium($id){
        Premium::where('id',$id)->delete();
        $msg = "Premium korisnika je uspješno ulonjen!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function loadComments(){
        $reportsM = Report::with('user','comment')->get();
        foreach($reportsM as $report){
            $report->comment->user = $report->comment->user()->first();
        }

        $reportsS = Subreport::with('user','subcomment')->get();
        foreach($reportsS as $report){
            $report->subcomment->user = $report->subcomment->user()->first();
        }

        return view('admin.comment')->with('reportsM',$reportsM)->with('reportsS',$reportsS);
        //return $reportsM;
    }

    public function removeCommentM($id){
        Comment::where('id',$id)->delete();
        $msg = "Komentar je uspješno ulonjen!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function removeCommentS($id){
        Subcomment::where('id',$id)->delete();
        $msg = "Komentar je uspješno ulonjen!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function skipCommentM($id){
        Report::where('id',$id)->delete();
        $msg = "Prijava je zanemarena!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function skipCommentS($id){
        Subeport::where('id',$id)->delete();
        $msg = "Prijava je zanemarena!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function loadAdmins(){
        $admins = Admin::get();
        return view('admin.adminList')->with('admins',$admins);
    }

    public function removeAdmin($id){
        Admin::where('id',$id)->delete();
        $msg = "Admin profil je uklonjen!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function loadContent(){
        $reportsM = MovieReport::with('user','movie')->get();

        $reportsE = EpisodeReport::with('user','episode')->get();

        return view('admin.content')->with('reportsM',$reportsM)->with('reportsE',$reportsE);
    }

    public function loadGenre(){
        return view('admin.genre');
    }

    public function addGenre(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);

        $genre = new Genre;
        $genre->name = $request->name;

        $genre->save();
        
        $msg = "Žanr je uspješno unijet!";
        return redirect()->back()->withErrors([$msg]);
    }

    public function loadContentM($id){
        $movie = Movie::where('id',$id)->first();
        $check = 1;
        return view('admin.check')->with('content',$movie)->with('check',$check);
    }

    public function loadContentS($id){
        $episode = Episode::where('id',$id)->first();
        $check = 0;
        return view('admin.check')->with('content',$episode)->with('check',$check);
    }

    public function skipContent(Request $request){
        if($request->check==1){
            MovieReport::where('movie_id',$request->id)->delete();
        }else{
            EpisodeReport::where('movie_id',$request->id)->delete();
        }
        $msg = "Prijava je zanemarena!";
        return $this->loadContent()->withErrors([$msg]);
    }

    public function removeContent(Request $request){
        if($request->check==1){
            Movie::where('id',$request->id)->delete();
        }else{
            Episode::where('id',$request->id)->delete();
        }
        $msg = "Prijavljeni sadržaj je uklonjen!";
        return $this->loadContent()->withErrors([$msg]);
    }
}
