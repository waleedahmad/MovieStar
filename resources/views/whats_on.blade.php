@extends('layout')

@section('content')
    <div class="wrapper">

        @include('navbar')

        <div id="content_hero" style="background-image: url(img/hero-whats-on.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <span class="title">Take a look at</span>
                        <h1>What's on</h1>
                    </div>
                </div>
            </div>
        </div>

        {{--What's on--}}
        <div class="container section negative-margin">
            <div class="row">
                <div class="col-sm-12">
                    <div class="live-search">
                        <input type="text" id="search" placeholder="Type to search">
                        <i class="material-icons">search</i>
                    </div>
                    <div class="tabs movies ui-tabs ui-corner-all ui-widget ui-widget-content">
                        @include('screenings.screenings')
                    </div>
                </div>
            </div>
        </div>


        @include('footer')
    </div>
@endSection