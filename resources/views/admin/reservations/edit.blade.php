@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Edit Reservation : {{$reservation->screening->movie->name}} {{$reservation->screening->movie->details->release_year}} -
                    {{\Carbon\Carbon::parse($reservation->screening->show_time)->toDayDateTimeString()}}
                </h2>

                <a href="/admin/screenings/{{$reservation->screening->id}}/reservations" class="btn btn-default">
                    <span>
                        Back
                    </span>
                </a>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6"
                      method="post"
                      action="/admin/screenings/{{$reservation->screening->id}}/reservation/{{$reservation->id}}"
                      style="padding: 0px;"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('user') ? ' has-error' : '' }}">
                        <label for="movie" class="control-label">User</label>
                        <select name="user" id="screening-movie">
                            <option value="" {{old('user') === '' ? 'selected' : ''}}>Select</option>
                            @foreach(\App\User::where('role','=','user')->get() as $user)
                                <option value="{{$user->id}}" {{old('user') === $user->id ? 'selected' : $reservation->user_id === $user->id ? 'selected' : ''}}>{{$user->email}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('user'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tickets') ? ' has-error' : '' }}">
                        <label for="tickets_count" class="control-label">How many tickets?</label>

                        <div class="">
                            <input id="tickets_count" type="text" name="tickets" value="{{ old('tickets') ? old('tickets') : $reservation->tickets_count }}">

                            @if ($errors->has('tickets'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tickets') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <span>
                                Update Reservation
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection

@section('scripts')
    <script src="/lib/selectize/dist/js/standalone/selectize.min.js"></script>
@endSection

@section('styles')
    <link rel="stylesheet" href="/lib/selectize/dist/css/selectize.default.css">
@endSection

@section('post_scripts')
    <script>
        $('#screening-movie').selectize({
            create: false,
            sortField: 'text'
        });
    </script>
@endSection