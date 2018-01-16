@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    Food Orders
                </h2>
            </div>

            @if($orders->count())
                <div class="table-responsive">
                    <table class="table table-hover" style="table-layout: fixed;">
                        <thead>
                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Name
                            </th>

                            <td>
                                Email
                            </td>

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
                                    {{$order->user->name}}
                                </td>

                                <td>
                                    {{$order->user->email}}
                                </td>

                                <td>
                                    {{$order->created_at->diffForHumans()}}
                                </td>

                                <td>
                                    {{$order->total}}
                                </td>

                                <td>
                                    <input type="checkbox" value="checked" class="order-completed" data-id="{{$order->id}}" {{$order->completed ? 'checked' : ''}}>
                                </td>

                                <td>
                                    <input type="checkbox" value="checked" class="order-paid" data-id="{{$order->id}}" {{$order->paid ? 'checked' : ''}}>
                                </td>

                                <td>
                                    <a href="/admin/orders/{{$order->id}}" class="btn btn-default" data-id="{{$order->id}}">
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
    </div>
@endSection