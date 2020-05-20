@extends('layouts.frame')

@section('title')
    {{__('Katalog')}}
@endsection

@section('content')
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">{{__('Najbolje')}}</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{url('/')}}">{{__('Početna')}}</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">{{__('Katalog')}}</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- filter -->
	{{--<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">
						<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">{{__('Žanr:')}}</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Action/Adventure">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									
								</ul>
							</div>
							<!-- end filter item -->						

							<!-- filter item -->
							<div class="filter__item" id="filter__rate">
								<span class="filter__item-label">{{__('Ocjena:')}}</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__imbd-start"></div>
										<div id="filter__imbd-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-rate">
									<div id="filter__imbd"></div>
								</div>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__year">
								<span class="filter__item-label">{{__('Godina:')}}</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__years-start"></div>
                                        <div id="filter__years-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
									<div id="filter__years"></div>
								</div>
							</div>
							<!-- end filter item -->
						</div>
						
						<!-- filter btn -->
						<button class="filter__btn" type="button">filtriraj</button>
						<!-- end filter btn -->
					</div>
				</div>
			</div>
		</div>
	</div>--}}
	<!-- end filter -->
	<br><br>
    

    <!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
				<!-- card -->
				@foreach ($data[0] as $movie)
					<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
						<div class="card">
							<div class="card__cover">
								<img src="{{$movie->picture}}" alt="">	
								<a href="{{"movie/{$movie->id}"}}" class="card__play">
									<i class="icon ion-ios-play"></i>
								</a>
							</div>
							<div class="card__content">
								<h3 class="card__title">
								    <a href="{{"movie/{$movie->id}"}}">{{$movie->title}}</a>
								</h3>
								<span class="card__category">
									@foreach ($movie->genres as $genre)
                                        <a>{{$genre->name}}</a>
									@endforeach
								</span>
								<span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
							</div>
						</div>
					</div>
				@endforeach
				<br><br><br>
                <!-- end card -->
                
                <!-- card -->
				@foreach ($data[1] as $movie)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img src="{{$movie->picture}}" alt="">	
                                <a href="{{"series/{$movie->id}/1"}}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title">
                                    <a href="{{"series/{$movie->id}/1"}}">{{$movie->title}}</a>
                                </h3>
                                <span class="card__category">
                                    @foreach ($movie->genres as $genre)
                                        <a>{{$genre->name}}</a>
                                    @endforeach
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            <br><br><br>
            <!-- end card -->
			</div>
		</div>
	</div>
    <!-- end catalog -->
@endsection