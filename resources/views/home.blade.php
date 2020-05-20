{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}


@extends('layouts.frame')

@section('title')
    {{__('Početna')}}    
@endsection

@section('content')

<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        <div class="item home__cover" data-bg="{{asset('img/home/home__bg.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('img/home/home__bg2.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('img/home/home__bg3.jpg')}}"></div>
        <div class="item home__cover" data-bg="{{asset('img/home/home__bg4.jpg')}}"></div>
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title"><b>NAJNOVIJE</b></h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">            
                    <?php $i=0; ?>
                    @foreach ($data[0] as $movie)    
                        <div class="item">
                            <div class="card card--big">
                                <div class="card__cover">
                                    <img src="{{$movie['picture']}}" alt="">
                                    <a href="{{"movie/{$movie["id"]}"}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{"movie/{$movie["id"]}"}}">{{$movie["title"]}}</a></h3>
                                    <span class="card__category">
                                        {{--<a href="#">Action</a>
                                        <a href="#">Triler</a>--}}
                                        @foreach ($data[2][$i] as $genre)
                                            <a>{{$genre["genre_name"]}}</a>
                                        @endforeach
                                        <?php $i++; ?>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie["rate"]}}</span>
                                </div>
                            </div>
                        </div>
                        <?php if($i>2){ break;} ?>
                    @endforeach
                    
                    <?php $i=0; ?>
                    @foreach ($data[1] as $movie)
                        <div class="item">
                            <div class="card card--big">
                                <div class="card__cover">
                                <img src="{{$movie['picture']}}" alt="">
                                    <a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}">{{$movie["seriesTitle"]}}: {{$movie["title"]}}</a></h3>
                                    <span class="card__category">
                                        @foreach ($data[3][$i] as $genre)
                                            <a>{{$genre["genre_name"]}}</a>
                                        @endforeach
                                        <?php $i++; ?>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie["rate"]}}</span>
                                </div>
                            </div>
                        </div>
                        <?php if($i>2){ break;} ?>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->


<!-- content -->
<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">{{__('Novo')}}</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">{{__('SVE')}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">{{__('FILMOVI')}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">{{__('SERIJE')}}</a>
                        </li>
                    </ul>
                    <!-- end content tabs nav -->

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row">
                    <?php $i=0; ?>
                    @foreach($data[0] as $movie)
                        <!-- card -->
                        <?php if($i>=3): ?>
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{$movie['picture']}}" alt="">
                                            <a href="{{"movie/{$movie["id"]}"}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title"><a href="{{"movie/{$movie["id"]}"}}">{{$movie["title"]}}</a></h3>
                                            <span class="card__category">
                                                @foreach ($data[2][$i] as $genre)
                                                    <a>{{$genre["genre_name"]}}</a>
                                                @endforeach
                                            </span>

                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie["rate"]}}</span>

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>{{$movie["views"]}}</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$movie["description"]}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- end card -->
                        <?php $i++; ?>
                        <?php if($i>5){break;}?>
                    @endforeach

                    <?php $i=0; ?>
                    @foreach ($data[1] as $movie)
                        <!-- card -->
                        <?php if($i>=3):?>
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{$movie['picture']}}" alt="">
                                            <a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title"><a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}">{{$movie["seriesTitle"]}}: {{$movie["title"]}}</a></h3>
                                            <span class="card__category">
                                                @foreach ($data[3][$i] as $genre)
                                                    <a>{{$genre["genre_name"]}}</a>
                                                @endforeach
                                            </span>

                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie["rate"]}}</span>

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$movie["description"]}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php if($i>5){ break;} ?>
                        <!-- end card -->
                    @endforeach
                </div>
            </div>

            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                <div class="row">
                    <!-- card -->
                    <?php $i=0; ?>
                    @foreach ($data[0] as $movie)
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{$movie['picture']}}" alt="">
                                    <a href="{{"movie/{$movie["id"]}"}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{"movie/{$movie["id"]}"}}">{{$movie['title']}}</a></h3>
                                    <span class="card__category">
                                        @foreach ($data[2][$i] as $genre)
                                            <a>{{$genre["genre_name"]}}</a>
                                        @endforeach
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie['rate']}}</span>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                    @endforeach
                    <!-- end card -->
                </div>
            </div>

            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                <div class="row">
                    <!-- card -->
                    <?php $i=0; ?>
                    @foreach ($data[1] as $movie)
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{$movie['picture']}}" alt="">
                                    <a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}">{{$movie["seriesTitle"]}}: {{$movie["title"]}}</a></h3>
                                    <span class="card__category">
                                        @foreach ($data[3][$i] as $genre)
                                            <a>{{$genre["genre_name"]}}</a>
                                        @endforeach
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie['rate']}}</span>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                    @endforeach
                    <!-- end card -->
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</section>

{{--<hr style="border: 1px solid black">--}}
<!-- expected premiere -->
<section class="section section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <h2 class="section__title">{{__('Najgledanije')}}</h2>
            </div>
            <!-- end section title -->

            <?php $i=0; ?>
            @foreach ($data[4] as $movie)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{$movie['picture']}}" alt="">
                            <a href="{{"movie/{$movie["id"]}"}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{"movie/{$movie["id"]}"}}">{{$movie['title']}}</a></h3>
                            <span class="card__category">
                                @foreach ($data[6][$i] as $genre)
                                    <a>{{$genre["genre_name"]}}</a>
                                @endforeach
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie['rate']}}</span>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <!-- end card -->
            @endforeach

            <?php $i=0; ?>
            @foreach ($data[5] as $movie)
                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="{{$movie['picture']}}" alt="">
                            <a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{"series/{$movie["seriesId"]}/{$movie["id"]}"}}">{{$movie["seriesTitle"]}}: {{$movie["title"]}}</a></h3>
                            <span class="card__category">
                                @foreach ($data[7][$i] as $genre)
                                    <a>{{$genre["genre_name"]}}</a>
                                @endforeach
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$movie['rate']}}</span>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <!-- end card -->
            @endforeach

            <!-- section btn -->
            <div class="col-12">
                <a href="{{url('/catalog')}}" class="section__btn">{{__('sve')}}</a>
            </div>
            <!-- end section btn -->
        </div>
    </div>
</section>
<!-- end expected premiere -->

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