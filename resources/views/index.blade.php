@extends('layout')

@section('content')
    <div class="wrapper">
        @include('navbar')
        <div id="hero" class="carousel slide carousel-fade" data-ride="carousel">
            <img src="/img/scroll-arrow.svg" alt="Scroll down" class="scroll">
            <div class="container">
                <ol class="carousel-indicators">
                    @foreach($slider as $screening)
                        <li data-target="#hero" data-slide-to="{{$loop->iteration - 1}}" @if($loop->iteration === 1) class="active" @endif></li>
                        @endforeach
                </ol>
            </div>

            {{--Slider--}}
            <div class="carousel-inner">
                @foreach($slider as $screening)
                    <div class="item @if($loop->iteration === 1) active @endif" style="background-image: url({{'/storage/'.$screening->movie->details->poster_uri}})">
                        <div class="container">
                            <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                                <div class="col-md-9">
                                    <span class="title">
                                        @foreach($screening->movie->genre as $genre)
                                            @if($loop->iteration != 1),@endif {{$genre->info->name}}
                                        @endforeach
                                    </span>

                                    <h1>{{$screening->movie->name}}</h1>

                                    <p>{{$screening->movie->details->description}}</p>

                                    <div class="buttons">
                                        <span class="certificate">
                                            {{$screening->movie->details->audience}}
                                        </span>
                                        <a href="{{$screening->movie->details->youtube_url}}" data-vbtype="video" class="venobox btn btn-default vbox-item">
                                            <i class="material-icons">play_arrow</i>
                                            <span>Play trailer</span>
                                        </a>

                                        <a href="/movie/{{$screening->movie->id}}" class="btn btn-default">
                                            <i class="material-icons">local_movies</i>
                                            <span>Screening Timings</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{--New in--}}
        <div class="container section">
            <div class="row">
                <div class="col-sm-12">
                    <h2>New in</h2>
                    <div class="slick-carousel" id="newIn">

                        @foreach($slider as $screening)
                            <div class="movie-slide">
                                <div class="movie-poster">
                                    <aside>
                                        <div>
                                            <a href="{{$screening->movie->details->youtube_url}}" data-vbtype="video" class="venobox play vbox-item">
                                                <i class="material-icons">play_arrow</i>
                                            </a>
                                            <a href="/movie/{{$screening->movie->id}}" class="read-more">read more</a>
                                            <span class="date">Released: {{$screening->movie->details->release_year}}</span>
                                        </div>
                                    </aside>
                                    <a href="#">
                                        <img src="{{'/storage/'.$screening->movie->details->image_uri}}" alt="Movie title">
                                    </a>
                                </div>
                                <h4 class="no-underline">{{$screening->movie->name}}</h4>
                                {{--<div class="star-rating">
                                    <i class="material-icons">star_rate</i>
                                    <i class="material-icons">star_rate</i>
                                    <i class="material-icons">star_rate</i>
                                    <i class="material-icons">star_rate</i>
                                    <i class="material-icons">star_rate</i>
                                </div>--}}
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        {{--What's on--}}
        <div class="container section">
            <div class="row">
                <div class="col-sm-12">
                    @include('screenings.screenings')
                </div>
            </div>
        </div>


        {{--Coming So--}}
        <section class="dark">
            <div class="container section remove-bottom-padding">
                <div class="row comingSoon-slides">
                    <div class="col-sm-12">
                        <h2>Coming soon</h2>
                        @foreach($coming_soon as $movie)
                            <div class="row single-slide Slide{{$loop->iteration}}" style="opacity: 1; height: auto; padding-bottom: 40px;">
                                <div class="bg" style="background: url({{'/storage/'.$movie->details->poster_uri}});"></div>
                                <div class="col-sm-5 col-xs-12 slide-content">
                                    <span class="title">Drama, Thriller</span>
                                    <h3 class="no-underline">{{$movie->name}}</h3>
                                    {{--<div class="star-rating">
                                        <i class="material-icons">star_rate</i>
                                        <i class="material-icons">star_rate</i>
                                        <i class="material-icons">star_rate</i>
                                        <i class="material-icons">star_rate</i>
                                        <i class="material-icons">star_rate</i>
                                    </div>--}}
                                    <div class="date">
                                        <i class="material-icons">date_range</i> {{$movie->details->release_year}}
                                    </div>
                                    <p>{{$movie->details->description}}</p>
                                    <p><a href="/movie/{{$movie->id}}" class="arrow-button">More info</a></p>
                                </div>
                                <div class="col-sm-6 col-xs-12 col-sm-push-1 slide-video">
                                    <a href="{{$movie->details->youtube_url}}" data-vbtype="video" class="venobox video vbox-item">
                                        <i class="material-icons">play_arrow</i>
                                        <img src="{{'/storage/'.$movie->details->poster_uri}}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <div class="slick-carousel" id="comingSoon">
                            @foreach($coming_soon as $movie)
                                <div data-dynamicclass="Slide{{$loop->iteration}}" style="opacity: 1;">
                                    <a href="#">
                                        <img src="{{'/storage/'.$movie->details->image_uri}}" alt="">
                                    </a>
                                    <h5 class="left no-underline">{{$movie->name}}</h5>
                                    <span class="release-date">{{$movie->details->release_year}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('footer')
    </div>
@endSection