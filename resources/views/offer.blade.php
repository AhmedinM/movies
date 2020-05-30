@extends('layouts.frame')

@section('title')
    {{__('Ponuda')}}
@endsection

@section('content')
    <!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">{{__('Ponuda')}}</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="{{url('/')}}">{{__('Početna')}}</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">{{__('Ponuda')}}</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- end page title -->
    

    <!-- pricing -->
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- plan features -->
				<div class="col-12">
					<ul class="row plan-features">
						<li class="col-12 col-md-6 col-lg-4">Najbolja ponuda!</li>
						<li class="col-12 col-md-6 col-lg-4">Dostupno na svim uređajima!</li>
						<li class="col-12 col-md-6 col-lg-4">Besplatno gledanje!</li>
						<li class="col-12 col-md-6 col-lg-4">Veliki broj filmova i serija!</li>
						<li class="col-12 col-md-6 col-lg-4">Dodatne mogućnosti nakon registracije!</li>
						<li class="col-12 col-md-6 col-lg-4">Povlašćeno PREMIUM članstvo!</li>
					</ul>
				</div>
				<!-- end plan features -->

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
                        <div class="price__item price__item--first"><span>{{__('Gost')}}</span> <span>{{__('Besplatno')}}</span></div>
                        <div class="price__item"><span>{{__('Pristup sajtu')}}</span></div>
                        <div class="price__item"><span>{{__('Provjera sadržaja')}}</span></div>
                        <div class="price__item"><span>{{__('Opisi sadržaja')}}</span></div>
                        <div class="price__item"><span>{{__('Čitanje komentara i recenzija')}}</span></div>
                        <div class="price__item"><span>{{__('Mogućnost registracije')}}</span></div>
					</div>
				</div>
                <!-- end price -->
                
                <!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>{{__('Registrovan')}}</span> <span>{{__('Besplatno')}}</span></div>
						<div class="price__item"><span>{{__('Neograničeno')}}</span></div>
						<div class="price__item"><span>{{__('Gledanje sadržaja')}}</span></div>
						<div class="price__item"><span>{{__('Ocjenjivanje')}}</span></div>
						<div class="price__item"><span>{{__('Pisanje komentara')}}</span></div>
						@guest
							<a href="{{url('/register')}}" class="price__btn">{{__('Registruj se')}}</a>
						@endguest
					</div>
				</div>
				<!-- end price -->

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price price--premium">
						<div class="price__item price__item--first"><span>{{__('Premium')}}</span> <span>€5.99</span></div>
						<div class="price__item"><span>{{__('1 mjesec')}}</span></div>
						<div class="price__item"><span>{{__('Obavještenja')}}</span></div>
						<div class="price__item"><span>{{__('Pisanje recenzija')}}</span></div>
                        <div class="price__item"><span>{{__('Postavljanje titlova')}}</span></div>
						<div class="price__item"><span>{{__('Preuzimanje sadržaja')}}</span></div>
						@if ($premium==null)
							<a href="/premium" class="price__btn">{{__('Odaberi')}}</a>
						@endif
					</div>
				</div>
				<!-- end price -->
			</div>
		</div>
	</div>
    <!-- end pricing -->
    

    <!-- features -->
	<section class="section section--dark">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Ostalo</h2>
				</div>
				<!-- end section title -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-tv feature__icon"></i>
						<h3 class="feature__title">Ultra HD</h3>
						<p class="feature__text">Svaki naš video snimak je najboljeg kvaliteta.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-film feature__icon"></i>
						<h3 class="feature__title">Filmovi</h3>
						<p class="feature__text">Veliki izbor najnovijih filmova.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-trophy feature__icon"></i>
						<h3 class="feature__title">Nagrade</h3>
						<p class="feature__text">Naš rad je prepoznat i nagrađen od strane velikog broja udruženja i pojedinaca iz oblasti kinematografije.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-notifications feature__icon"></i>
						<h3 class="feature__title">Najnovije</h3>
						<p class="feature__text">Konstantno ažuriramo sadržaj našeg sajta najnovijim filmovima i serijama.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-rocket feature__icon"></i>
						<h3 class="feature__title">Najbolje</h3>
						<p class="feature__text">Kod nas možete naći sva popularna ostvarenja ocijenjena najboljim ocjenama od strane kritike.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-globe feature__icon"></i>
						<h3 class="feature__title">Globalno</h3>
						<p class="feature__text">Djela iz različitih djelova svijeta i iz različitih vremenskih perioda.</p>
					</div>
				</div>
				<!-- end feature -->
			</div>
		</div>
	</section>
    <!-- end features -->
    


    <!-- partners -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title section__title--no-margin">{{__('Partneri')}}</h2>
                </div>
                <!-- end section title -->

                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--last-with-margin">Sve ovo ne bi bilo moguće bez podrške određenih ljudi i organizacija koji nam konstantno pružaju podršku. Naš zajednički cilj je da obezbijedimo što bolji kvalitet usluga za naše korisnike. Veliki i raznovrstan sadržaj, moderan dizajn i lakoća upravljanja našim sajtom kao i mogućnost odgovaranja na vaše zahtjeve ne bi bili isti bez njih. Naš tim vam je uvijek na usluzi, uz pomoć naših partnera i to:</p>
                </div>
                <!-- end section text -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->
            </div>
        </div>
    </section>
    <!-- end partners -->
@endsection