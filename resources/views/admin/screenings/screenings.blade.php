@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    Screenings
                </h2>

                <a href="/admin/screenings/add" class="btn btn-default">
                    <span>
                        Add Screening
                    </span>
                </a>
            </div>

            @if($screenings->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>
                                Cover
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Release Year
                            </th>

                            <th>
                                Audience
                            </th>

                            <th>
                                Screening Date & Time
                            </th>

                            <th>
                                Running Time
                            </th>

                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($screenings as $screening)
                            <tr class="screening-tr">
                                <td>
                                    <div class="image-holder">
                                        <img src="/storage/{{$screening->movie->details->image_uri}}" alt="">
                                    </div>
                                </td>
                                <td>{{$screening->movie->name}}</td>
                                <td>{{$screening->movie->details->release_year}}</td>
                                <td>
                                    {{$screening->movie->details->audience}}
                                </td>

                                <td>
                                    {{\Carbon\Carbon::parse($screening->show_time)->toDayDateTimeString()}}
                                </td>

                                <td>
                                    {{$screening->movie->details->running_time}} Min
                                </td>

                                <td>
                                    <a href="/admin/screenings/{{$screening->id}}/edit" class="btn btn-default">
                                        <span>
                                            Edit
                                        </span>
                                    </a>

                                    <a href="#" class="btn btn-default delete-screening" data-id="{{$screening->id}}">
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
                No Screening available.
            @endif
        </div>
    </div>
@endSection