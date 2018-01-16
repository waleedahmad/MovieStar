@extends('layout')

@section('content')
    <div class="wrapper user">

        @include('navbar')

        <div id="content_hero" style="background-image: url(/img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <h1>Your Orders</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section movies">
            @if($orders->count())
                <div class="table-responsive">
                    <table class="table table-hover" style="table-layout: fixed;">
                        <thead>
                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Placed
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Completed
                            </th>

                            <th>
                                Paid
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="order-tr">
                                <td>
                                    {{$order->id}}
                                </td>

                                <td>
                                    {{$order->created_at->diffForHumans()}}
                                </td>

                                <td>
                                    {{$order->total}}
                                </td>

                                <td>
                                    {{$order->completed ? 'YES' : 'NO' }}
                                </td>

                                <td>
                                    {{$order->paid ? 'YES' : 'NO' }}
                                </td>

                                <td>
                                    <a href="/food/orders/{{$order->id}}" class="btn btn-default" data-id="{{$order->id}}">
                                        <span>
                                            View
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                No orders.
            @endif

        </div>



        @include('footer')
    </div>
@endSection