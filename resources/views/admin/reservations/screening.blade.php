@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content customers">
            <div class="title">
                <h2>
                    {{$screening->movie->name}} {{$screening->movie->details->release_year}} -
                    {{\Carbon\Carbon::parse($screening->show_time)->toDayDateTimeString()}}
                </h2>

                <a href="/admin/screenings/{{$screening->id}}/reservations/add" class="btn btn-default" style="margin-left: 10px;">
                    <span>
                        Sell Tickets
                    </span>
                </a>

                <a href="/admin/screenings/tickets" class="btn btn-default">
                    <span>
                        Screenings
                    </span>
                </a>
            </div>

            <div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>
                                Total Seats
                            </th>

                            <th>
                                Ticket Price
                            </th>

                            <th>
                                Sold
                            </th>

                            <th>
                                Available
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$screening->seats_count}}
                                </td>

                                <td>
                                    Rs.{{$screening->ticket_price}}
                                </td>

                                <td>
                                    {{$screening->reservations->sum('tickets_count')}}
                                </td>

                                <td>
                                    {{$screening->seats_count - $screening->reservations->sum('tickets_count')}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-top: 20px;">
                @if($screening->reservations->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>
                                    Profile Picture
                                </th>

                                <th>
                                    Tickets
                                </th>

                                <th>
                                    Paid
                                </th>

                                <th>
                                    Name
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Phone #
                                </th>

                                <th>
                                    Reserved at
                                </th>

                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($screening->reservations as $reservation)
                                <tr class="customer-tr">
                                    <td>
                                        <div class="image-holder">
                                            <img src="/storage/{{$reservation->user->image_uri}}" alt="">
                                        </div>
                                    </td>

                                    <td>
                                        {{$reservation->tickets_count}}
                                    </td>

                                    <td>
                                        {{$reservation->paid ? 'YES' : 'NO'}}
                                    </td>


                                    <td>
                                        {{$reservation->user->name}}
                                    </td>

                                    <td>
                                        {{$reservation->user->email}}
                                    </td>

                                    <td>
                                        {{$reservation->user->phone_no ? $reservation->user->phone_no : 'N/A' }}
                                    </td>

                                    <td>
                                        {{$reservation->created_at}}
                                    </td>

                                    <td>
                                        <a href="/admin/screenings/{{$screening->id}}/reservation/{{$reservation->id}}/edit" class="btn btn-default">
                                            <span>
                                                Edit
                                            </span>
                                        </a>

                                        <a href="#" class="btn btn-default delete-reservation" data-id="{{$reservation->id}}">
                                            <span>
                                                Delete
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    No reservations for this screening.
                @endif
            </div>

        </div>
    </div>
@endSection