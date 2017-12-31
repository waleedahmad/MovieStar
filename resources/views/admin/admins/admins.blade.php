@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content admins">
            <div class="title">
                <h2>
                    Administrators
                </h2>

                <a href="/admin/admins/add" class="btn btn-default">
                    <span>
                        Add Admin
                    </span>
                </a>
            </div>

            @if($admins->count())
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
                        @foreach($admins as $admin)
                            <tr class="admin-tr">
                                <td>
                                    <div class="image-holder">
                                        <img src="/storage/{{$admin->image_uri}}" alt="">
                                    </div>
                                </td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    {{$admin->phone_no}}
                                </td>

                                <td>
                                    {{$admin->gender}}
                                </td>

                                <td>
                                    <a href="/admin/admins/{{$admin->id}}/edit" class="btn btn-default">
                                    <span>
                                        Edit
                                    </span>
                                    </a>

                                    @if(Auth::user()->id != $admin->id)
                                        <a href="#" class="btn btn-default delete-admin" data-id="{{$admin->id}}">
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
                No administrators in database.
            @endif
        </div>
    </div>
@endSection