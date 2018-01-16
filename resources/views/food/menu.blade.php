@extends('layout')

@section('content')
    <div class="wrapper user">

        @include('navbar')

        <div id="content_hero" style="background-image: url(/img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <h1>Food Menu</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section movies">
            @if($menu->count())
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
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu as $item)
                            <tr class="screening-tr">
                                <td>
                                    {{$item->item_name}}
                                </td>

                                <td>
                                    {{$item->price}}
                                </td>

                                <td>
                                    <a href="#" class="btn btn-default order-food" data-id="{{$item->id}}">
                                        <span>
                                            Place Order
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                No food items.
            @endif
        </div>


        @include('footer')
    </div>
@endSection