@extends('layout')

@section('content')

    <div class="wrapper">

        @include('navbar')

        <div id="content_hero" style="background-image: url({{'/storage/'.$movie->details->poster_uri}})">
            <img src="/img/scroll-arrow.svg" alt="Scroll down" class="scroll">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0"
                     data-translatey="100">
                    <div class="col-md-9">
                        <span class="title">
                            @foreach($movie->genre as $genre)
                                @if($loop->iteration != 1),@endif {{$genre->info->name}}
                            @endforeach
                        </span>
                        <h1>{{$movie->name}}</h1>
                        <p>{{$movie->details->description}}</p>
                        <div class="buttons">
                            <span class="certificate">
                                {{$movie->details->audience}}
                            </span>
                            <a href="{{$movie->details->youtube_url}}" data-vbtype="video"
                               class="venobox btn btn-default vbox-item">
                                <i class="material-icons">play_arrow</i>
                                <span>Play trailer</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section single-movie">
            <div class="row">
                <div class="col-sm-7">
                    <h2>Synopsis</h2>
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="{{'/storage/'.$movie->details->image_uri}}" alt="{{$movie->name}}" class="poster">
                            <div class="share">
                                @if($movie->details->facebook)
                                    <a href="{{$movie->details->facebook}}">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                @endif

                                @if($movie->details->twitter)
                                        <a href="{{$movie->details->twitter}}">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                @endif

                            </div>
                        </div>
                        <div class="col-sm-7">
                            <h3 class="no-underline">The plot</h3>
                            <p>
                                {{$movie->details->plot}}
                            </p>
                            <ul class="movie-info">

                                <li><i>Director</i> {{$movie->details->director}}</li>
                                <li><i>Starring</i> {{$movie->details->starring}}</li>
                                <li><i>Release date</i> {{$movie->details->release_year}}</li>
                                <li><i>Running time</i> {{$movie->details->running_time}} mins</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-push-1">
                    <h2>Viewing times</h2>
                    <ul class="show-times">
                        <li>
                            @foreach($movie->screens as $s)
                                <span class="time">{{\Carbon\Carbon::parse($s->show_time)->toDayDateTimeString()}}</span>
                            @endforeach
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <section class="dark">
            <div class="container section remove-bottom-padding">
                <h2>
                    {{$movie->name}} {{$movie->details->release_year }} Trailer
                </h2>
                <div class="row comingSoon-slides singleGallery">
                    <div class="col-sm-12">
                        <div class="row single-slide slideOne" style="opacity: 0; height: 0px; padding-bottom: 0px;">
                            <div class="col-sm-12 slide-video">
                                <a href="https://youtu.be/AntcyqJ6brc" data-vbtype="video"
                                   class="venobox video vbox-item hoverZoomLink">
                                    <i class="material-icons">play_arrow</i>
                                    <img src="{{'/storage/'.$movie->details->poster_uri}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('footer')
    </div>
@endSection