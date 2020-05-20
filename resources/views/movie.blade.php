@extends('layouts.frame')

@section('title')
    {{$movie->title}}
@endsection

@section('content')
    <!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="{{asset('img/home/home__bg.jpg')}}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{$movie->title}}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{asset($movie->picture)}}" alt="{{$movie->picture}}">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie->rate}}</span>
										<ul class="card__list">
											<li>HD</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Žanr:</span>
											@foreach ($movie->genres as $genre)
												<a>{{$genre->name}}</a>		
											@endforeach
										</li>
										<li><span>Godina:</span>{{$movie->year}}</li>
										<li><span>Dužina:</span>{{$movie->duration}} minuta</li>
										<li><span>Zemlja:</span> <a href="#">{{$movie->country}}</a> </li>
									</ul>

									<div class="card__description card__description--details">
										{{$movie->description}}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls playsinline poster="{{asset('icon/favicon-32x32.png')}}" id="player">
						<!-- Video files -->
						{{--<source src="{{asset('videos/kolpa.mp4')}}" type="video/mp4">--}}
						<source src="{{$movie->video}}" type="video/mp4">
						<!-- Caption files -->
						<?php $i=0; ?>
						@foreach ($movie->captions as $cap)
							@if ($i==0)
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{$cap->file}}" default>
							@else
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{$cap->file}}">	
							@endif
						@endforeach

						<!-- Fallback for browsers that don't support the <video> element -->
                    </video>
                    <br>
                    <a href="{{$movie->video}}" download="{{$movie->title}}.mp4">Preuzmi</a>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Dostupno na uređajima:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Podijeli sa prijateljima:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="https://www.facebook.com"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="https://www.instagram.com"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="https://www.twitter.com"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="https://www.vk.com"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
    <!-- end details -->
    



    <!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Otkrij</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Komentari</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Recenzije</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<ul class="comments__list">
											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">30.08.2018, 17:53</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>

														<button type="button">7<i class="icon ion-md-thumbs-down"></i></button>
													</div>
												</div>
											</li>
											@foreach ($movie->comments as $c)
												
											@endforeach
											<li class="comments__item">
												<div class="comments__autor">
													@foreach ($c->user as $user)
														<img class="comments__avatar" src="{{$user->picture}}" alt="">
														<span class="comments__name">{{$user->name}}</span>
														<span class="comments__time">{{$c->created_at}}</span>
													@endforeach
												</div>
												<p class="comments__text">{{$c->text}}</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>{{$c->likes}}</button>

														<button type="button">{{$c->disslikes}}<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													{{--<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>--}}
												</div>
											</li>
										</ul>
										@auth
											<form action="{{url('/movie/comment')}}" method="POST" class="form">
												@csrf
												<input type="hidden" name="hid" id="hid" value="{{$movie->id}}">
												<textarea id="text" name="text" class="form__textarea" placeholder="Napiši komentar..." required></textarea>
												<input type="submit" class="form__btn" name="btn" id="btn" value="Pošalji">
											</form>
										@endauth
									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul class="reviews__list">
											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="{{asset('img/user.png')}}" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>
										</ul>

										<form action="#" class="form">
											<input type="text" class="form__input" placeholder="Naslov...">
											<textarea class="form__textarea" placeholder="Recenzija..."></textarea>
                                            <div class="form__slider">
												<div class="form__slider-rating" id="slider__rating"></div>
												<div class="form__slider-value" id="form__slider-value"></div>
                                            </div>
											<button type="button" class="form__btn">Pošalji</button>
										</form>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">Preporučeno:</h2>
						</div>
						<!-- end section title -->

						<!-- card -->
						@foreach ($movie->recommend as $rec)
							<div class="col-6 col-sm-4 col-lg-6">
								<div class="card">
									<div class="card__cover">
										<img src="{{asset($rec->picture)}}" alt="">
										<a href="/movie/{{$rec->id}}" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="/movie/{{$rec->id}}">{{$rec->title}}</a></h3>
										<span class="card__rate"><i class="icon ion-ios-star"></i>{{$rec->rate}}</span>
									</div>
								</div>
							</div>
						@endforeach
						<!-- end card -->
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->
@endsection