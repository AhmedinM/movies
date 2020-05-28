<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{--<title>Admin Panel</title>--}}
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('nalika/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/font-awesome.min.css') }}">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/nalika-icon.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{ asset('nalika/css/main.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/calendar/fullcalendar.print.min.css')}}">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('nalika/css/modals.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('nalika/css/form/all-type-forms.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" type="text/css" href="{{asset('nalika/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('nalika/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="{{asset('nalika/img/logo/logo.png')}}" alt="" /></a>
                <strong><img src="{{asset('nalika/img/logo/logosn.png')}}" alt="" /></strong>
            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="#"><img src="{{asset('nalika/img/notification/4.jpg')}}" alt="" /></a>
					<h2><span class="min-dtn">Admin</span></h2>
				</div>
				<div class="profile-social-dtl">
					<ul class="dtl-social">
						<li><a href="https://www.facebook.com"><i class="icon nalika-facebook"></i></a></li>
						<li><a href="https://www.twitter.com"><i class="icon nalika-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com"><i class="icon nalika-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a href="{{url('/admin/panel')}}">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Panel</span>
							</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-forms icon-wrap"></i> <span class="mini-click-non">Dodaj novo</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Dodaj žanr" href="{{url('/admin/add-genre')}}"><span class="mini-sub-pro">Žanr</span></a></li>
                                <li><a title="Dodaj film" href="{{url('/admin/add-movie')}}"><span class="mini-sub-pro">Film</span></a></li>
                                <li><a title="Dodaj seriju" href="{{url('/admin/add-serie')}}"><span class="mini-sub-pro">Serija</span></a></li>
                                <li><a title="Dodaj sezou" href="{{url('/admin/add-season')}}"><span class="mini-sub-pro">Sezona</span></a></li>
                                <li><a title="Dodaj epizodu" href="{{url('/admin/add-episode')}}"><span class="mini-sub-pro">Epizoda</span></a></li>
                                <li><a title="Dodaj prevod filma" href="{{url('/admin/add-movieCaption')}}"><span class="mini-sub-pro">Prevod filma</span></a></li>
                                <li><a title="Dodaj prevod epizode" href="{{url('/admin/add-serieCaption')}}"><span class="mini-sub-pro">Prevod epizode</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Prijave</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Prijavljeni komentari" href="{{url('/admin/comments')}}"><span class="mini-sub-pro">Komentari</span></a></li>
                                <li><a title="Prijavljeni sadržaj" href="{{url('/admin/content')}}"><span class="mini-sub-pro">Sadržaj</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-table icon-wrap"></i> <span class="mini-click-non">Lista korisnika</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Lista običnih korisnika" href="{{url('/admin/users')}}"><span class="mini-sub-pro">Obični</span></a></li>
                                <li><a title="Lista premium naloga" href="{{url('/admin/premiums')}}"><span class="mini-sub-pro">Premium</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Administratori</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Dodaj admina" href="{{url('/admin/add-admin')}}"><span class="mini-sub-pro">Dodaj novog</span></a></li>
                                <li><a title="Lista admina" href="{{url('/admin/admins')}}"><span class="mini-sub-pro">Lista</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{url('/admin/panel')}}"><img class="main-logo" src="{{asset('nalika/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info" style="margin-right: -115%">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-alarm" aria-hidden="true"></i>
                                                                  @if ($notifications==0)
                                                                    <span class=""></span>
                                                                  @else
                                                                    <span class="indicator-nt"></span>  
                                                                  @endif </a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Obavještenja</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            @if ($notifications==3)
                                                              <li>
                                                                <a href="{{url('')}}">
                                                                    <div class="notification-content">
                                                                        <h2>Prijave</h2>
                                                                        <p>Imate nepregledanih prijavljenih komentara.</p>
                                                                    </div>
                                                                </a>
                                                              </li>
                                                              <li>
                                                                <a href="{{url('')}}">
                                                                    <div class="notification-content">
                                                                        <h2>Prijave</h2>
                                                                        <p>Imate nepregledanog prijavljenog sadržaja.</p>
                                                                    </div>
                                                                </a>
                                                              </li>
                                                            @else
                                                              @if ($notifications==2)
                                                                <li>
                                                                  <a href="{{url('')}}">
                                                                      <div class="notification-content">
                                                                          <h2>Prijave</h2>
                                                                          <p>Imate nepregledanog prijavljenog sadržaja.</p>
                                                                      </div>
                                                                  </a>
                                                                </li>
                                                              @else
                                                                @if ($notifications==1)
                                                                  <li>
                                                                    <a href="{{url('')}}">
                                                                        <div class="notification-content">
                                                                            <h2>Prijave</h2>
                                                                            <p>Imate nepregledanih prijavljenih komentara.</p>
                                                                        </div>
                                                                    </a>
                                                                  </li>
                                                                @endif
                                                              @endif
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>
															{{--<span class="admin-name">Advanda Cro</span>
															<i class="icon nalika-down-arrow nalika-angle-dw nalika-icon"></i>--}}
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{url('/admin/logout')}}"><span class="icon nalika-unlocked author-log-ic"></span>Odjavi se</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											<div class="breadcomb-ctn">
												<h2>Admin</h2>
												<p>Dobrodošao, <span class="bread-ntd">Admine</span></p>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        @yield('content')
        
        
        
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{asset('nalika/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('nalika/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('nalika/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('nalika/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('nalika/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('nalika/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('nalika/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('nalika/js/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('nalika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('nalika/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('nalika/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('nalika/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('nalika/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('nalika/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('nalika/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('nalika/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('nalika/js/calendar/fullcalendar-active.js')}}"></script>
	<!-- float JS
		============================================ -->
    <script src="{{asset('nalika/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('nalika/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('nalika/js/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('nalika/js/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('nalika/js/flot/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('nalika/js/flot/curvedLines.js')}}"></script>
    <script src="{{asset('nalika/js/flot/flot-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('nalika/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('nalika/js/main.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('js/tab.js')}}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{asset('js/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('js/icheck/icheck-active.js')}}"></script>
</body>

</html>