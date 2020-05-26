@extends('layouts.frame')

@section('title')
    {{$user->name}}
@endsection

@section('link1')
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">

    <!-- CSS files -->
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{$user->name}} - Plejlista</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="/">{{'Početna'}}</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Plejlista</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="user-information">
                        <div class="user-img">
                            {{--<a href="#"><img src="{{asset('img/user-img.png')}}" alt=""><br></a>--}}
                            @if ($user->picture==null)
                                <a href="#"><img src="{{asset('img/user-img.png')}}" alt=""><br></a>
                            @else
                                <a href="#"><img src="{{asset($user->picture)}}" alt=""><br></a>
                            @endif
                            <form action="{{route('photo.change')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input style="width: 160px; margin-left:30px" id="picture" name="picture"  class="redbtn" type="file" required>
                                <br>
                                <input class="redbtn" type="submit" value="promijeni sliku">
                            </form>
                            {{--<a href="#" class="redbtn">Promijeni sliku</a>--}}
                        </div>
                        <div class="user-fav">
                            <p>Detalji</p>
                            <ul>
                                <li><a href="{{url('/profile')}}">Profil</a></li>
                                @if ($user->premium!==null)
                                    <li class="active"><a href="{{url('/profile/playlist')}}">Plejlista</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                


                <div class="flex-wrap-movielist grid-fav">

                    <div class="movie-item-style-2 movie-item-style-1 style-3">
                        <img src="{{asset('storage/img/cover.jpg')}}" alt="">
                        <div class="hvr-inner">
                            <a  href="moviesingle.html"> Otvori <i class="ion-android-arrow-dropright"></i> </a>
                        </div>
                        <div class="mv-item-infor">
                            <h6><a href="moviesingle.html">oblivion</a></h6>
                            <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                        </div>
                    </div>
                    @foreach ($user->moviePlaylists as $play)
                        <div class="movie-item-style-2 movie-item-style-1 style-3">
                            <img src="{{asset("{$play->movie->picture}")}}" alt="">
                            <div class="hvr-inner">
                                <a  href="{{url("/movie/{$play->movie->id}")}}"> Otvori <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href={{url("/movie/{$play->movie->id}")}}>{{$play->movie->title}}</a></h6>
                                <p class="rate"><i class="ion-android-star"></i><span>{{$play->movie->rate}}</span>/10</p>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($user->episodePlaylists as $play)
                        <div class="movie-item-style-2 movie-item-style-1 style-3">
                            <img src="{{asset("{$play->episode->season->serie->picture}")}}" alt="">
                            <div class="hvr-inner">
                                <a  href="{{url("/series/{$play->episode->season->serie->id}/{$play->episode->id}")}}"> Otvori <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href={{url("/series/{$play->episode->season->serie->id}/{$play->episode->id}")}}>{{$play->episode->season->serie->title}}: {{$play->episode->title}}</a></h6>
                                <p class="rate"><i class="ion-android-star"></i><span>{{$play->episode->season->serie->rate}}</span>/10</p>
                            </div>
                        </div>
                    @endforeach

                </div>



            </div>
        </div>
    </div>
@endsection