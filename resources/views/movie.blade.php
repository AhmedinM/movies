@extends('layouts.frame')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
						<source src="{{asset("{$movie->video}")}}" type="video/mp4">
						<!-- Caption files -->
						<?php $i=0; ?>
						@foreach ($movie->captions as $cap)
							@if ($i==0)
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{asset("{$cap->file}")}}" default>
							@else
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{asset("{$cap->file}")}}">	
							@endif
						@endforeach

						<!-- Fallback for browsers that don't support the <video> element -->
                    </video>
					<br>
					@if ($movie->premium!==null)
						<a style="color:green;" href="{{$movie->video}}" download="{{$movie->title}}.mp4"><i class="icon ion-md-download"></i> Preuzmi</a>
						<span style="color: white;">|</span>
						<a id="play" data-id="{{$movie->id}}" style="color: yellow;" href="{{$movie->video}}" download="{{$movie->title}}.mp4"><i class="icon ion-md-add"></i> Dodaj na plejlistu</a>
						<span style="color: white;">|</span>
					@endif
					@auth
						<a id="wrong" data-id="{{$movie->id}}" style="color: red;" href=""><i class="icon ion-md-flag"></i> Prijavi problem</a>
					@endauth
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
							{{--<span class="details__share-title">Podijeli sa prijateljima:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="https://www.facebook.com"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="https://www.instagram.com"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="https://www.twitter.com"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="https://www.vk.com"><i class="icon ion-logo-vk"></i></a></li>
							</ul>--}}
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

							@if ($movie->premium!==null)
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Recenzije</a>
								</li>
							@endif
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
											@foreach ($movie->comments as $c)
												<li class="comments__item">
													<div class="comments__autor">
														@foreach ($c->user as $user)
															@if ($user->picture!==null)
																<img class="comments__avatar" src="{{asset($user->picture)}}" alt="">
															@else
																<img class="comments__avatar" src="{{asset(img/user-img.png)}}" alt="">
															@endif
															<span class="comments__name">{{$user->name}}</span>
															<span class="comments__time">{{$c->created_at}}</span>
														@endforeach
													</div>
													<p class="comments__text">{{$c->text}}</p>
													<div class="comments__actions">
														<div class="comments__rate">
															@guest
																<button type="button"><i class="icon ion-md-thumbs-up"></i>{{$c->likes}}</button>
																<button type="button">{{$c->disslikes}}<i class="icon ion-md-thumbs-down"></i></button>
															@endguest
															@auth
																<button class="pr" type="button"><i class="like icon ion-md-thumbs-up" data-movie="{{$movie->id}}" data-comm="{{$c->id}}" data-num="{{$c->likes}}"></i><span class="numb">{{$c->likes}}</span></button>
																<button class="dr" type="button" ><span class="numb">{{$c->disslikes}}</span><i class="unlike icon ion-md-thumbs-down" data-movie="{{$movie->id}}" data-comm="{{$c->id}}" data-num="{{$c->disslikes}}"></i></button>
															@endauth
														</div>
														@auth
															<a class="prkom" style="color: red; font-size: 14px;" href="" data-comm="{{$c->id}}"><i class="icon ion-md-flag"></i> Prijavi komentar</a>
														@endauth

														<button type="button">
													</div>
												</li>	
											@endforeach
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
											@foreach ($movie->reviews as $review)
												<li class="reviews__item">
													<div class="reviews__autor">
														@foreach ($c->user as $user)
															@if ($user->picture!==null)
																<img class="reviews__avatar" src="{{asset($user->picture)}}" alt="">
															@else
																<img class="reviews__avatar" src="{{asset(img/user-img.png)}}" alt="">
															@endif
															<span class="reviews__name">{{$review->title}}</span>
															<span class="reviews__time">{{$review->created_at}}, {{$user->name}}</span>
														@endforeach
														<span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$review->rate}}</span>
													</div>
													<p class="reviews__text">{{$review->description}}</p>
												</li>
											@endforeach
										</ul>

										<form action="{{url('/movie/review')}}" method="POST" class="form">
											@csrf
											<input type="hidden" name="hid" id="hid" value="{{$movie->id}}">
											<input type="text" class="form__input" placeholder="Naslov..." id="title" name="title" required>
											<textarea class="form__textarea" placeholder="Recenzija..." id="textR" name="text" required></textarea>
											<div style="color:grey;">
												<label for="makrId">Ocjena:</label> <br>
												<input style="background-color: grey; height:2px;" type="range" name="mark" id="markId" value="5" min="1" max="10" oninput="outId.value = markId.value"> <br>
												<output name="out" id="outId">5</output>
											</div>
											   
											<input type="submit" class="form__btn" name="btn" id="btn2" value="Pošalji">
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
						@if ($movie->recommend!==[])
							<div class="col-12">
								<h2 class="section__title section__title--sidebar">Preporučeno:</h2>
							</div>
						@endif
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

	<!-- Add Jquery to page -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
	</script>
	<script>
		jQuery(document).ready(function(){
			// when the user clicks on like
			jQuery('.like').on('click', function(e){
				e.preventDefault();
				$.ajaxSetup({
      				headers: {
		        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
    			});
				var movieId = $(this).data('movie');
				var commentId = $(this).data('comm');
				var liked = $(this).data('num');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/movie/comment/like')}}",
					type: 'post',
					data: {
						'liked': liked,
						'movieId': movieId,
						'commentId': commentId
					},
					success: function(response){
						//$post.parent().find('span.likes_count').text(response + " likes");
						$post.parent().find('.numb').text(response[0]);
						$post.parent().parent().find('.dr').find('.numb').text(response[1]);
						//$post.addClass('hide');
						//$post.siblings().removeClass('hide');
					}
				});
			});

			// when the user clicks on unlike
			jQuery('.unlike').on('click', function(e){
				e.preventDefault();
				$.ajaxSetup({
      				headers: {
		        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
    			});
				var movieId = $(this).data('movie');
				var commentId = $(this).data('comm');
				var unliked = $(this).data('num');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/movie/comment/unlike')}}",
					type: 'post',
					data: {
						'unliked': unliked,
						'movieId': movieId,
						'commentId': commentId
					},
					success: function(response){
						//$post.parent().find('span.likes_count').text(response + " likes");
						$post.parent().find('.numb').text(response[1]);
						$post.parent().parent().find('.pr').find('.numb').text(response[0]);
						//$post.addClass('hide');
						//$post.siblings().removeClass('hide');
					}
				});
			});

			//prijava komentara
			jQuery('.prkom').on('click', function(e){
				e.preventDefault();
				$.ajaxSetup({
      				headers: {
		        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
    			});
				var commentId = $(this).data('comm');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/movie/comment/report')}}",
					type: 'post',
					data: {
						'commentId': commentId
					},
					success: function(response){
						if(response==1){
							alert("Komentar je prijavljen!");
						}
					}
				});
			});

			//prijava sadrzaja
			jQuery('#wrong').on('click', function(e){
				e.preventDefault();
				$.ajaxSetup({
      				headers: {
		        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
    			});
				var id = $(this).data('id');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/movie/report')}}",
					type: 'post',
					data: {
						'id': id
					},
					success: function(response){
						if(response==1){
							alert("Problem je prijavljen!");
						}
					}
				});
			});


			//plejlista
			jQuery('#play').on('click', function(e){
				e.preventDefault();
				$.ajaxSetup({
      				headers: {
		        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
    			});
				var id = $(this).data('id');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/movie/playlist')}}",
					type: 'post',
					data: {
						'id': id
					},
					success: function(response){
						if(response==1){
							alert("Dodato na plejlistu!");
						}
					}
				});
			});


		});
	</script>
@endsection