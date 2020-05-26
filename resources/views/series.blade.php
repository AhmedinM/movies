@extends('layouts.frame')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
    Series
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
					<h1 class="details__title">{{$serie->title}} : {{$serie->episode->title}}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src="{{asset('img/covers/cover.jpg')}}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>{{$serie->rate}}</span>

										<ul class="card__list">
											<li>HD</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Žanr:</span>
											@foreach ($serie->genres as $genre)
												<a>{{$genre->name}}</a>		
											@endforeach
										</li>
										<li><span>Godina:</span>{{$serie->year}}</li>
										<li><span>Dužina:</span>{{$serie->duration}} minuta</li>
										<li><span>Zemlja:</span> <a href="#">{{$serie->country}}</a> </li>
									</ul>

									<div class="card__description card__description--details">
										{{$serie->description}}
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
						<source src="{{$serie->episode->video}}" type="video/mp4">
						<!-- Caption files -->
						<?php $i=0; ?>
						@foreach ($serie->episode->captions as $cap)
							@if ($i==0)
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{$cap->file}}" default>
							@else
								<track kind="captions" label="{{$cap->title}}" srclang="{{$cap->short}}" src="{{$cap->file}}">	
							@endif
						@endforeach

						<!-- Fallback for browsers that don't support the <video> element -->
					</video>
					<br>
					@if ($serie->premium!==null)
						<a style="color: green;" href="{{$serie->episode->video}}" download="{{$serie->episode->title}}.mp4"><i class="icon ion-md-download"></i> Preuzmi</a>
						<span style="color: white;">|</span>
						<a id="play" data-id="{{$serie->episode->id}}" style="color: yellow;" href="{{$serie->episode->video}}" download="{{$serie->episode->title}}.mp4"><i class="icon ion-md-add"></i> Dodaj na plejlistu</a>
						<span style="color: white;">|</span>
					@endif
					@auth
						<a id="wrong" data-id="{{$serie->episode->id}}" style="color: red;" href="#"><i class="icon ion-md-flag"></i> Prijavi problem</a>
					@endauth
				</div>
				<!-- end player -->

				<!-- accordion -->
				<div class="col-12 col-xl-6">
					<div class="accordion" id="accordion">
						<?php $i=0; $j=0;?>
						@foreach ($serie->seasons as $season)
							<div class="accordion__card">
								@if ($j==0)
									<div class="card-header" id="headingOne">
										<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								@else
									<div class="card-header" id="headingTwo">
										<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								@endif
								<?php $j++; ?>
										<span>Sezona: {{$season->number}}</span>
										<span>Episode: <?=count($season->episodes)?></span>
									</button>
								</div>
								
								@if ($i==0)
									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								@else
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								@endif
								<?php $i++; ?>
										<div class="card-body">
											<table class="accordion__list">
												<thead>
													<tr>
														<th>Broj</th>
														<th>Naslov</th>
														<th>Datum</th>
													</tr>
												</thead>

												<tbody>
													@foreach ($season->episodes as $episode)
														<tr>
															<th>{{$episode->number}}</th>
															<td><a style="text-decoration: none; color: #7e8285" href="{{url('series/'.$serie->id.'/'.$episode->id.'')}}">{{$episode->title}}</a></td>
															<td>{{$episode->created_at}}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
							</div>
						@endforeach
					</div>
				</div>
				<!-- end accordion -->

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

							@auth
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Recenzije</a>
								</li>
							@endauth
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
											@foreach ($serie->comments as $c)
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
															@auth
																<button class="pr" type="button"><i class="like icon ion-md-thumbs-up" data-comm="{{$c->id}}"></i><span class="numb">{{$c->likes}}</span></button>
																<button class="dr" type="button"><span class="numb">{{$c->disslikes}}</span><i class="unlike icon ion-md-thumbs-down" data-comm="{{$c->id}}"></i></button>
															@endauth
															@guest
																<button type="button"><i class="icon ion-md-thumbs-up"></i>{{$c->likes}}</button>
																<button type="button">{{$c->disslikes}}<i class="icon ion-md-thumbs-down"></i></button>
															@endguest
														</div>
														@auth
															<a class="prkom" data-comm="{{$c->id}}" style="color: red; font-size: 14px;" href="#"><i class="icon ion-md-flag"></i> Prijavi komentar</a>
														@endauth
													</div>
												</li>	
											@endforeach
										</ul>
										@auth
											<form action="{{url('/serie/comment')}}" method="POST" class="form">
												@csrf
												<input type="hidden" name="hid" id="hid" value="{{$serie->id}}">
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
											@foreach ($serie->reviews as $review)
												<li class="reviews__item">
													<div class="reviews__autor">
														@foreach ($review->user as $user)
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
										
										@if ($serie->premium!==null)
											<form action="{{url('/serie/review')}}" method="POST" class="form">
												@csrf
												<input type="hidden" name="hid" id="hid" value="{{$serie->id}}">
												<input type="text" class="form__input" placeholder="Naslov..." id="title" name="title" required>
												<textarea class="form__textarea" placeholder="Recenzija..." id="textR" name="text" required></textarea>
												<div style="color:grey;">
													<label for="makrId">Ocjena:</label> <br>
													<input style="background-color: grey; height:2px;" type="range" name="mark" id="markId" value="5" min="1" max="10" oninput="outId.value = markId.value"> <br>
													<output name="out" id="outId">5</output>
												</div>
												
												<input type="submit" class="form__btn" name="btn" id="btn2" value="Pošalji">
											</form>
										@endif
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
						@if ($serie->recommend!==[])
							<div class="col-12">
								<h2 class="section__title section__title--sidebar">Preporučeno:</h2>
							</div>
						@endif
						<!-- end section title -->

						<!-- card -->
						@foreach ($serie->recommend as $rec)
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
				var commentId = $(this).data('comm');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/serie/comment/like')}}",
					type: 'post',
					data: {
						'commentId': commentId
					},
					success: function(response){
						$post.parent().find('.numb').text(response[0]);
						$post.parent().parent().find('.dr').find('.numb').text(response[1]);
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
				var commentId = $(this).data('comm');
				$post = $(this);

				jQuery.ajax({
					url: "{{url('/serie/comment/unlike')}}",
					type: 'post',
					data: {
						'commentId': commentId
					},
					success: function(response){
						$post.parent().find('.numb').text(response[1]);
						$post.parent().parent().find('.pr').find('.numb').text(response[0]);
						console.log(response);
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
					url: "{{url('/serie/comment/report')}}",
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
					url: "{{url('/serie/report')}}",
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
					url: "{{url('/serie/playlist')}}",
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