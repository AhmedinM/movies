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
	<title>{{__('PREMIUM')}}</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="{{asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
                        <form method="POST" action="{{ route('premium.activate') }}" class="sign__form">
                            @csrf

							<a href="{{url('/')}}" class="sign__logo">
								<img src="img/logo.svg" alt="">
                            </a>
                            
                            <div style="color: white; font-size: 40px">
                                Postani <span style="color: #e81594">PREMIUM</span> korisnik
                                <br>
                            </div>
                            <br><br>

							@if (session('errMsg'))
                                <div style="color:white" class="alert alert-danger" role="alert">
                                    {{session('errMsg')}}
                                </div>
                                <br>
                            @endif

							<div class="sign__group">
                                <input id="number" name="number" type="text" placeholder="Broj kartice..." class="sign__input form-control @error('email') is-invalid @enderror" name="number" required autofocus>
								@error('number')
									<br>
                                    <span style="color: white" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
									</span>
                                @enderror
							</div>

							<div class="sign__group">
                                <input id="pin" name="pin" type="password" class="sign__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="PIN...">
                                @error('pin')
                                <br>
                                    <span style="color: white" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
							<button class="sign__btn" type="submit">{{ __('Prijava') }}</button>

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