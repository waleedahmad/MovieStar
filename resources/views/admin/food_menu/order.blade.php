@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    Order # {{$order->id}}
                </h2>
            </div>

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
            
        </div>
    </div>
@endSection