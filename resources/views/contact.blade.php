@extends('layout')

@section('content')
    <div class="wrapper">

        @include('navbar')

        <div id="content_hero" style="background-image: url(img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <span class="title">Have any questions?</span>
                        <h1>Please contact us</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section negative-margin">
            <div class="row">
                <div class="col-sm-12">
                    <div id="map" style="position: relative; overflow: hidden;"></div>
                </div>
            </div>
        </div>

        <div class="container section negative-margin contact">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Send a message</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email">
                        </div>
                        <div class="form-group">
                            <label>Where did you hear about us?</label>
                            <input type="text">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea rows="5"></textarea>
                        </div>
                        <div class="form-group right-align">
                            <button class="btn btn-ghost">Send message</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5 col-sm-push-1">
                    <div class="icon-row">
                        <div class="col">
<span class="circle">
<i class="material-icons">place</i>
</span>
                        </div>
                        <div class="col">
                            <h4 class="no-underline">Address</h4>
                            <p>105 Hadayatullah Block Mustafa Town</p>
                        </div>
                    </div>
                    <div class="icon-row">
                        <div class="col">
<span class="circle">
<i class="material-icons">email</i>
</span>
                        </div>
                        <div class="col">
                            <h4 class="no-underline">Email</h4>
                            <p>info@moviestar.com</p>
                        </div>
                    </div>
                    <div class="icon-row">
                        <div class="col">
<span class="circle">
<i class="material-icons">phone in talk</i>
</span>
                        </div>
                        <div class="col">
                            <h4 class="no-underline">Telephone</h4>
                            <p>+92 301 4377011</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('footer')
    </div>
@endSection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzbEe1YItOGVa3h_gT66MTFP056M0xQyo"></script>

    <script>
        //intialize the map
        function initialize() {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(31.498500, 74.273622)
            };

            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);

            var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                icon: '/img/pin.svg'
            });



        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endSection