{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}




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
	<title>{{__('Verifikacija')}}</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="{{asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
                        <form method="POST" action="{{ route('verification.resend') }}" class="sign__form">
                            @csrf

							<div class="sign__group">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
							</div>

							<div class="sign__group" style="color: white">
                                {{ __('Da biste nastavili dalje, otvorite link koji smo poslali na Vaš mejl.') }}
                                <br>
                                {{ __('Ako Vam mejl nije stigao') }},
                            </div>
							
							<button class="sign__btn" type="submit">{{ __('Pošalji opet') }}</button>
							<br>
							<div class="sign__group">
								<a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="header__sign-in">
                                            <i class="icon ion-ios-log-in"></i>
                                            <span>odjavi se</span>
                                    </a>
							</div>
						</form>
						
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
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