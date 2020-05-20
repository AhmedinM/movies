{{--@extends('layouts.app')--}}

<!DOCTYPE html>
<html lang="en">

{{--@section('content')--}}
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/plyr.css')}}">
	<link rel="stylesheet" href="{{asset('css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{asset('css/default-skin.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('icon/favicon-32x32.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('icon/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('icon/apple-touch-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('icon/apple-touch-icon-144x144.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Ahmedin Muratovic">
	<title>{{__('Prijavi se')}}</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="{{asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
                        <form method="POST" action="{{ route('login') }}" class="sign__form">
                            @csrf

							<a href="{{url('/')}}" class="sign__logo">
								<img src="img/logo.svg" alt="">
							</a>

							@if (session('succMsg'))
                                <div style="color:white" class="alert alert-success" role="alert">
                                    {{session('succMsg')}}
                                </div>
                            @endif

							<div class="sign__group">
                                <input id="email" name="email" type="email" placeholder="Email..." class="sign__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								@error('email')
									<br>
                                    <span style="color: white" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
									</span>
                                @enderror
							</div>

							<div class="sign__group">
                                <input id="password" name="password" type="password" class="sign__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Lozinka...">
								@error('password')
								<br>
                                    <span style="color: white" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">{{ __('Zapamti me') }}</label>
							</div>
							
							<button class="sign__btn" type="submit">{{ __('Prijava') }}</button>

                            <span class="sign__text">{{__("Nemaš profil?")}} <a href="{{route('register')}}">{{__('Registruj se!')}}</a></span>
                            @if (Route::has('password.request'))
                                    <span class="sign__text"><a href="{{ route('password.request') }}">
                                        {{ __('Zaboravio/la si lozinku?') }}
                                    </a></span>
                            @endif
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{asset('js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{asset('js/wNumb.js')}}"></script>
	<script src="{{asset('js/nouislider.min.js')}}"></script>
	<script src="{{asset('js/plyr.min.js')}}"></script>
	<script src="{{asset('js/jquery.morelines.min.js')}}"></script>
	<script src="{{asset('js/photoswipe.min.js')}}"></script>
	<script src="{{asset('js/photoswipe-ui-default.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>
{{--@endsection--}}

</html>