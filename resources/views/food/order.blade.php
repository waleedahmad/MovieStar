@extends('layout')

@section('content')
    <div class="wrapper user">

        @include('navbar')

        <div id="content_hero" style="background-image: url(/img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <h1>Order # {{$order->id}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section movies">
            @if($order->items->count())
                <div class="table-responsive">
                    <table class="table table-hover" style="table-layout: fixed;">
                        <thead>
                        <tr>

                            <th>
                                Name
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Total
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr class="cart-tr">
                                <td>
                                    {{$item->menu->item_name}}
                                </td>

                                <td>
                                    {{$item->menu->price}}
                                </td>

                                <td>
                                    {{$item->quantity}}
                                </td>

                                <td>
                                    {{$item->quantity * $item->menu->price }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                No food items in cart.
            @endif

            <a href="/food/orders" class="btn btn-default">
                <span>
                    All Orders
                </span>
            </a>


            @if(!$order->completed)
                <a href="#" class="btn btn-default cancel-order" data-id="{{$order->id}}">
                    <span>
                        Cancel Order
                    </span>
                </a>
            @endif

        </div>



        @include('footer')
    </div>
@endSection