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
                        <h2 class="section__title">{{__('Rezultati')}}</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{url('/')}}">{{__('Početna')}}</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">{{__('Pretraga')}}</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>

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

            <!-- card -->
				@foreach ($data[2] as $movie)
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{$movie->season[0]->serie->picture}}" alt="">	
                            <a href="{{"series/{$movie->season[0]->serie->id}/{$movie->id}"}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">
                            <a href="{{"series/{$movie->season[0]->serie->id}/{$movie->id}"}}">{{$movie->season[0]->serie->title}}: {{$movie->title}}</a>	
                            </h3>
                            <span class="card__category">
                                @foreach ($movie->genres as $genre)
                                    <a>{{$genre->name}}</a>
                                @endforeach
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->season[0]->serie->rate}}</span>
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