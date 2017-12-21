@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
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

            <div>
                Lorde
            </div>
        </div>
    </div>
@endSection