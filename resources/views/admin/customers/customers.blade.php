@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content customers">
            <div class="title">
                <h2>
                    Customers
                </h2>
            </div>

            @if($customers->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>
                                Profile Picture
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
                                Gender
                            </th>

                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr class="customer-tr">
                                <td>
                                    <div class="image-holder">
                                        <img src="/storage/{{$customer->image_uri}}" alt="">
                                    </div>
                                </td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>
                                    {{$customer->phone_no ? $customer->phone_no : 'N/A'}}
                                </td>

                                <td>
                                    {{$customer->gender ? $customer->gender : 'N/A'}}
                                </td>

                                <td>

                                    @if(Auth::user()->id != $customer->id)
                                        <a href="#" class="btn btn-default delete-customer" data-id="{{$customer->id}}">
                                        <span>
                                            Delete
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
                No customers in database
            @endif
        </div>
    </div>
@endSection