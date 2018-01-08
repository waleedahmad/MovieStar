@extends('layout')

@section('content')
    <div class="wrapper user">

        @include('navbar')

        <div id="content_hero" style="background-image: url(img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <h1>Your Reservations</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section movies">
            @if($reservations->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>
                                Cover
                            </th>

                            <th>
                                Res id #
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Screening Date & Time
                            </th>

                            <th>
                                Running Time
                            </th>

                            <th>
                                Tickets #
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Paid
                            </th>

                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr class="screening-tr">

                                <td>
                                    <div class="image-holder">
                                        <a href="/movie/{{$reservation->screening->movie->id}}">
                                            <img src="/storage/{{$reservation->screening->movie->details->image_uri}}" alt="">
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    {{$reservation->id}}
                                </td>

                                <td>{{$reservation->screening->movie->name}}</td>

                                <td>
                                    {{\Carbon\Carbon::parse($reservation->screening->show_time)->toDayDateTimeString()}}
                                </td>

                                <td>
                                    {{$reservation->screening->movie->details->running_time}} Min
                                </td>

                                <td>
                                    {{$reservation->tickets_count}}
                                </td>

                                <td>
                                    {{$reservation->tickets_count * $reservation->screening->ticket_price}}
                                </td>

                                <td>
                                    {{$reservation->paid ? 'YES' : 'NO'}}
                                </td>

                                <td>
                                    @if(!$reservation->paid)
                                        <a href="#" class="btn btn-default cancel-reservation" data-id="{{$reservation->id}}">
                                            <span>
                                                Cancel Reservation
                                            </span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                No reservations.
            @endif
        </div>


        @include('footer')
    </div>
@endSection