@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    Food Menu
                </h2>

                <a href="/admin/menu/add" class="btn btn-default">
                    <span>
                        Add Food Item
                    </span>
                </a>
            </div>

            @if($items->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                Name
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Prep Time
                            </th>

                            <th>
                                Availability
                            </th>

                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="menu-tr">
                                <td>{{$item->item_name}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    {{$item->prep_time}} Min
                                </td>

                                <td>
                                    {{$item->availability}}
                                </td>

                                <td>
                                    <a href="/admin/menu/{{$item->id}}/edit" class="btn btn-default">
                                        <span>
                                            Edit
                                        </span>
                                    </a>

                                    <a href="#" class="btn btn-default delete-menu" data-id="{{$item->id}}">
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
                No Food items in database.
            @endif
        </div>
    </div>
@endSection