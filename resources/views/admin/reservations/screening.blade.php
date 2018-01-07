@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    {{$screening->movie->name}}
                </h2>

                <a href="/admin/screenings/tickets" class="btn btn-default">
                    <span>
                        Screenings
                    </span>
                </a>
            </div>

            <div>
                <b>Tickets Count</b>: {{$screening->seats_count}} <br>
                <b>Ticket Price</b>: Rs.{{$screening->ticket_price}} <br>
                <b>Show Time</b>: {{\Carbon\Carbon::parse($screening->show_time)->toDayDateTimeString()}} <br>
            </div>

        </div>
    </div>
@endSection