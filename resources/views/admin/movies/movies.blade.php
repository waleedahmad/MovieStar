@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content movies">
            <div class="title">
                <h2>
                    Movies
                </h2>

                <a href="/admin/movies/add" class="btn btn-default">
                    <span>
                        Add Movie
                    </span>
                </a>
            </div>

            @if($movies->count())
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
                                Running Time
                            </th>

                            <td>
                                Coming Soon
                            </td>

                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr class="movie-tr">
                                <td>
                                    <div class="image-holder">
                                        <img src="/storage/{{$movie->details->image_uri}}" alt="">
                                    </div>
                                </td>
                                <td>{{$movie->name}}</td>
                                <td>{{$movie->details->release_year}}</td>
                                <td>
                                    {{$movie->details->audience}}
                                </td>

                                <td>
                                    {{$movie->details->running_time}} Min
                                </td>

                                <td>
                                    <input type="checkbox" value="checked" class="coming-soon" data-id="{{$movie->id}}" {{$movie->soon ? 'checked' : ''}}>
                                </td>

                                <td>
                                    <a href="/admin/movies/{{$movie->id}}/edit" class="btn btn-default">
                                        <span>
                                            Edit
                                        </span>
                                    </a>

                                    <a href="#" class="btn btn-default delete-movie" data-id="{{$movie->id}}">
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
                No movies in database.
            @endif
        </div>
    </div>
@endSection