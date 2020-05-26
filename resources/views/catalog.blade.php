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
                        <h2 class="section__title">{{__('Katalog')}}</h2>
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
	<form class="filter" method="POST" action="/catalog/filter">
		@csrf
		@if ($data[4]==1)
			<input type="hidden" name="type" id="type" value="1">
		@else
			<input type="hidden" name="type" id="type" value="0">
		@endif
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">

						<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">{{__('Žanr:')}}</span>

								{{--<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Žanr">
									<span></span>
								</div>--}}

								{{--<select class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									@foreach ($data[5] as $genre)
										<option>{{$genre->name}}</option>
									@endforeach
								</select>--}}
								<select name="genre" id="genre" style="background-color: #1e2129; color:white; width: 150px;">
									@foreach ($data[5] as $genre)
										<option value="{{$genre->id}}">{{$genre->name}}</option>
									@endforeach
								</select>
							</div>
							<!-- end filter item -->						

							<!-- filter item -->
							<div class="filter__item" id="filter__rate">
								<span class="filter__item-label">{{__('Ocjena:')}}</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" aria-haspopup="true" aria-expanded="false">
									{{--<div class="filter__range">
										<div id="filter__imbd-start"></div>
										<div id="filter__imbd-end"></div>
									</div>--}}
									<div style="color:white;">
										<label for="makrId">Min:</label> <br>
										<input style="background-color: white; height:2px;" type="range" step="0.1" name="mark" id="markId" value="0" min="0" max="10" oninput="outId.value = markId.value">
										<output name="out" id="outId">0</output>
									</div>
									<div style="color:white;">
										<label for="makrId2">Max:</label> <br>
										<input style="background-color: white; height:2px;" type="range" step="0.1" name="mark2" id="markId2" value="10" min="0" max="10" oninput="outId2.value = markId2.value">
										<output name="out2" id="outId2">10</output>
									</div>
									<span></span>
								</div>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__year">
								<span class="filter__item-label">{{__('Godina:')}}</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" aria-haspopup="true" aria-expanded="false">
									{{--<div class="filter__range">
										<div id="filter__years-start"></div>
                                        <div id="filter__years-end"></div>
									</div>--}}
									<div style="color:white;">
										<label for="makrId3">Min:</label> <br>
										<input style="background-color: white; height:2px;" type="range" step="1" name="mark3" id="markId3" value="1970" min="1970" max="2020" oninput="outId3.value = markId3.value">
										<output name="out3" id="outId3">1970</output>
									</div>
									<div style="color:white;">
										<label for="makrId4">Max:</label> <br>
										<input style="background-color: white; height:2px;" type="range" step="1" name="mark4" id="markId4" value="2020" min="1970" max="2020" oninput="outId4.value = markId4.value">
										<output name="out4" id="outId4">2020</output>
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
						<input class="filter__btn" type="submit" value="filtriraj">
						<!-- end filter btn -->
					</div>


				</div>
			</div>
		</div>
	</form>
    <!-- end filter -->
    

    <!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row">
				<!-- card -->
				<?php $i=0; ?>
				@foreach ($data[0] as $movie)
					<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
						<div class="card">
							<div class="card__cover">
								<img src="{{asset("$movie->picture")}}" alt="">	
								@if ($data[4]==1)
									<a href="{{"series/{$movie->seriesId}/{$movie->id}"}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								@else
									<a href="{{"movie/{$movie->id}"}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								@endif
							</div>
							<div class="card__content">
								<h3 class="card__title">
								@if ($data[4]==1)
									<a href="{{"series/{$movie->seriesId}/{$movie->id}"}}">{{$movie->seriesTitle}}: {{$movie->title}}</a>	
								@else
									<a href="{{"movie/{$movie->id}"}}">{{$movie->title}}</a>
								@endif
								</h3>
								<span class="card__category">
									@foreach ($data[1] as $genre)
										@if ($genre->genre_movie_id==$movie->id)
											<a>{{$genre->genre_name}}</a>
										@endif
									@endforeach
								</span>
								<span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
							</div>
						</div>
					</div>
					<?php $i++; ?>
				@endforeach
				<br><br><br>
				{{$data[0]->links('vendor.pagination.default')}}
				<!-- end card -->
			</div>
		</div>
	</div>
    <!-- end catalog -->
    
    <!-- expected premiere -->
	<section class="section section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">{{__('Najgledanije')}}</h2>
				</div>
				<!-- end section title -->

				@foreach ($data[2] as $movie)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{$movie->picture}}" alt="">
                            <a href="{{"movie/{$movie->id}"}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{"movie/{$movie->id}"}}">{{$movie->title}}</a></h3>
                            <span class="card__category">
                                @foreach ($data[1] as $genre)
									@if ($genre->genre_movie_id==$movie->id)
										<a>{{$genre->genre_name}}</a>
									@endif
								@endforeach
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            @endforeach

            @foreach ($data[3] as $movie)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{$movie->picture}}" alt="">
                            <a href="{{"series/{$movie->seriesId}/{$movie->id}"}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{"series/{$movie->seriesId}/{$movie->id}"}}">{{$movie->seriesTitle}}: {{$movie->title}}</a></h3>
                            <span class="card__category">
                                @foreach ($data[1] as $genre)
									@if ($genre->genre_movie_id==$movie->seriesId)
										<a>{{$genre->genre_name}}</a>
									@endif
								@endforeach
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            @endforeach

				<!-- section btn -->
				{{--<div class="col-12">
					<a href="#" class="section__btn">{{__('Još')}}</a>
				</div>--}}
				<!-- end section btn -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->
@endsection