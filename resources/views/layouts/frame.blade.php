<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700')}}" rel="stylesheet">

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
	<meta name="author" content="Dmitry Volkov">

	{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
	@yield('meta')
	<title>@yield('title')</title>

	{{--Profil--}}
	@yield('link1')
	{{----}}

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="{{url('/')}}" class="header__logo">
								<img src="{{asset('img/logo.svg')}}" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="header__nav-link" href="{{url('/')}}" aria-haspopup="true" aria-expanded="false">{{__('Početna')}}</a>

								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a style="font-size: 14px" class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('Katalog')}}</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="{{url('/movies-catalog')}}">{{__('Filmovi')}}</a></li>
										<li><a href="{{url('/series-catalog')}}">{{__('Serije')}}</a></li>
										<li><a href="{{url('/watched-top100')}}">{{__('Najgledanije')}}</a></li>
										<li><a href="{{url('/rated-top100')}}">{{__('Najbolje')}}</a></li>
									</ul>
								</li>
								<!-- end dropdown -->

								<li class="header__nav-item">
									<a href="{{url('/offer')}}" class="header__nav-link">{{__('Ponuda')}}</a>
								</li>

								@auth
									<li class="header__nav-item">
										<a href="{{url('/profile')}}" class="header__nav-link">{{__('Profil')}}</a>
									</li>
								@endauth

							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
                                    <i class="icon ion-ios-search"></i>
								</button>

                                @auth
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="header__sign-in">
                                            <i class="icon ion-ios-log-in"></i>
                                            <span>odjavi se</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endauth
                                @guest
								    <a href="{{route('login')}}" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>prijavi se</span>
                                    </a>
                                @endguest
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="{{url('/search')}}" method="POST" class="header__search">
			@csrf
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" id="srch" name="srch" placeholder="Traži filmove i serije koje želiš da gledaš..." required>

							<button>pretraži</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
    </header>
    
    @yield('content')

    <!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Preuzmi našu aplikaciju</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="{{asset('img/Download_on_the_App_Store_Badge.svg')}}" alt=""></a></li>
						<li><a href="#"><img src="{{asset('img/google-play-badge.png')}}" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">{{__('Stranice')}}</h6>
					<ul class="footer__list">
						<li><a href="{{url('/')}}">{{__('Početna')}}</a></li>
						<li><a href="{{url('/offer')}}">{{__('Ponuda')}}</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">{{__('Kontakt')}}</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="https:\\www.facebook.com"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="https:\\www.instagram.com"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="https:\\www.twitter.com"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="https:\\www.vk.com"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

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

</html>