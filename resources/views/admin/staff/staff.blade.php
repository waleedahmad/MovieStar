@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content staff">
            <div class="title">
                <h2>
                    Staff
                </h2>

                <a href="/admin/staff/add" class="btn btn-default">
                    <span>
                        Add Staff
                    </span>
                </a>
            </div>

            @if($staffers->count())
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
                        @foreach($staffers as $staff)
                            <tr class="staff-tr">
                                <td>
                                    <div class="image-holder">
                                        <img src="/storage/{{$staff->image_uri}}" alt="">
                                    </div>
                                </td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->email}}</td>
                                <td>
                                    {{$staff->phone_no}}
                                </td>

                                <td>
                                    {{$staff->gender}}
                                </td>

                                <td>
                                    <a href="/admin/staff/{{$staff->id}}/edit" class="btn btn-default">
                                    <span>
                                        Edit
                                    </span>
                                    </a>

                                    <a href="#" class="btn btn-default delete-staff" data-id="{{$staff->id}}">
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

                No Staff in database.
            @endif
        </div>
    </div>
@endSection