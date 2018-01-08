@extends('layout')

@section('content')

    <div class="wrapper">

        @include('navbar')

        <div id="content_hero" style="background-image: url({{'/storage/'.$screening->movie->details->poster_uri}})">
            <img src="/img/scroll-arrow.svg" alt="Scroll down" class="scroll">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0"
                     data-translatey="100">
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
                            <a href="{{$screening->movie->details->youtube_url}}" data-vbtype="video"
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
                    <h2>Reserve Tickets For: {{\Carbon\Carbon::parse($screening->show_time)->toDayDateTimeString()}}</h2>
                    <div class="row col-sm-12 col-md-12 col-lg-12">
                        <form method="post" action="/reserve/screening/{{$screening->id}}" style="padding: 0px;" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">How many tickets you want to reserve for <b>{{$screening->movie->name}}</b>?</label>

                                <div class="">
                                    <input id="name" type="text" name="tickets" value="{{ old('tickets') }}">

                                    @if ($errors->has('tickets'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('tickets') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <span>
                                        Reserve Tickets
                                    </span>
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-push-1">
                    <h2>Viewing times</h2>
                    <ul class="show-times">
                        <li>
                            @foreach($screening->movie->screens as $s)
                                <span class="time">
                                    {{\Carbon\Carbon::parse($s->show_time)->toDayDateTimeString()}}
                                    <a href="/reserve/screening/{{$s->id}}" style="clear:both;">Reserve Tickets</a>
                                </span>
                            @endforeach
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <section class="dark">
            <div class="container section remove-bottom-padding">
                <h2>
                    {{$screening->movie->name}} {{$screening->movie->details->release_year }} Trailer
                </h2>
                <div class="row comingSoon-slides singleGallery">
                    <div class="col-sm-12">
                        <div class="row single-slide slideOne" style="opacity: 0; height: 0px; padding-bottom: 0px;">
                            <div class="col-sm-12 slide-video">
                                <a href="https://youtu.be/AntcyqJ6brc" data-vbtype="video"
                                   class="venobox video vbox-item hoverZoomLink">
                                    <i class="material-icons">play_arrow</i>
                                    <img src="{{'/storage/'.$screening->movie->details->poster_uri}}" alt="">
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