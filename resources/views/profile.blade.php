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
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('content')
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>{{$user->name}}</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="/">{{'Početna'}}</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Profil</li>
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
                                <a href="#"><img src="{{$user->picture}}" alt=""><br></a>
                            @endif
                            <form action="/profile/change-photo" method="post">
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
                                <li  class="active"><a href="userprofile.html">Profil</a></li>
                                @if ($user->premium!==null)
                                    <li><a href="userfavoritelist.html">Plejlista</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="form-style-1 user-pro">
                        @if (isset($msg))
                            <div style="color: white">
                                {{$msg}}
                            </div>
                            <br><hr>
                        @endif
                        <form action="/profile/change-name" method="post" class="user">
                            @csrf
                            <h4>01. Korisnički detalji</h4>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="name">Ime</label>
                                    <input id="name" name="name" type="text" placeholder="{{$user->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input class="submit" type="submit" value="sačuvaj">
                                </div>
                            </div>	
                        </form>
                        <form method="POST" action="{{route('password.update')}}" class="password">
                            @csrf
                            <h4>02. Promjena lozinke</h4>
                            @if (session('errMsg'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('errMsg')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="oldPassword">Stara lozinka</label>
                                    <input id="oldPassword" type="password" name="oldPassword" placeholder="**********" required>
                                    @error('oldPassword')
                                        <span style="color: white" class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="newPassword">Nova lozinka</label>
                                    <input id="newPassword" name="newPassword" type="password" placeholder="***************" required>
                                    @error('newPassword')
                                        <span style="color: white" class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="confirmPassword">Ptvrdi novu lozinku</label>
                                    <input id="confirmPassword" name="confirmPassword" type="password" placeholder="*************** " required>
                                    @error('confirmPassword')
                                        <span style="color: white" class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input class="submit" type="submit" value="promijeni">
                                </div>
                            </div>	
                        </form>
                        <hr>
                        @if ($user->premium!==null)
                        <form method="POST" action="{{route('premium.delete')}}" class="password">
                            {{@method_field('DELETE')}}
                            @csrf
                            <h4>03. Premium</h4>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="password2">Lozinka</label>
                                    <input id="password2" type="password" name="password2" placeholder="**********" required>
                                    @error('password2')
                                        <span style="color: white" class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input onclick="return confirm('Potvrdite brisnje premium naloga!')" class="submit" type="submit" value="isključi">
                                </div>
                            </div>	
                        </form>
                        <hr>
                        @endif
                        <form method="POST" action="{{route('user.delete')}}" class="password">
                            {{@method_field('DELETE')}}
                            @csrf
                            <h4>BRISANJE PROFILA</h4>
                            <div class="row">
                                <div class="col-md-6 form-it">
                                    <label for="password1">Lozinka</label>
                                    <input id="password1" type="password" name="password1" placeholder="**********" required>
                                    @error('password1')
                                        <span style="color: white" class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input onclick="return confirm('Potvrdite brisnje profila!')" class="submit" type="submit" value="obriši profil">
                                </div>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection