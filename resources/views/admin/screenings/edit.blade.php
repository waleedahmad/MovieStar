@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Edit Screening : {{$screening->movie->name}}
                </h2>

                <a href="/admin/screenings" class="btn btn-default">
                    <span>
                        Back
                    </span>
                </a>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/admin/screenings/update" style="padding: 0px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('movie') ? ' has-error' : '' }}">
                        <label for="movie" class="control-label">Movie</label>
                        <select name="movie" id="screening-movie">
                            <option value="" {{old('movie') === '' ? 'selected' : ''}}>Select</option>
                            @foreach(\App\Movies::all() as $movie)
                                <option value="{{$movie->id}}" {{old('movie') === $movie->id ? 'selected' : $screening->movie_id === $movie->id ? 'selected' : ''}}>{{$movie->name}} - {{$movie->details->release_year}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('movie'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('movie') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('tickets_count') ? ' has-error' : '' }}">
                        <label for="tickets_count" class="control-label">Tickets Count</label>

                        <div class="">
                            <input id="tickets_count" type="text" name="tickets_count" value="{{ old('tickets_count') ? old('tickets_count') : $screening->seats_count }}">

                            @if ($errors->has('tickets_count'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tickets_count') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ticket_price') ? ' has-error' : '' }}">
                        <label for="ticket_price" class="control-label">Tickets Price (RS)</label>

                        <div class="">
                            <input id="ticket_price" type="text" name="ticket_price" value="{{ old('ticket_price') ? old('ticket_price') : $screening->ticket_price }}">

                            @if ($errors->has('ticket_price'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('showing_date') ? ' has-error' : '' }}">
                        <label for="showing_date" class="control-label">Showing Date</label>

                        <div class="">
                            <input id="showing-date" type="text" name="showing_date" value="{{ old('showing_date') ? old('showing_date') : \Carbon\Carbon::parse($screening->show_time)->toDateString() }}">

                            @if ($errors->has('showing_date'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('showing_date') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('showing_time') ? ' has-error' : '' }}">
                        <label for="showing_time" class="control-label">Showing Time</label>

                        <div class="">
                            <input id="showing-time" type="text" name="showing_time" value="{{ old('showing_time') ? old('showing_time') : \Carbon\Carbon::parse($screening->show_time)->toTimeString() }}">

                            @if ($errors->has('showing_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('showing_time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$screening->id}}">


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <span>
                                Update Screening
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
    <script src="/lib/wickedpicker/dist/wickedpicker.min.js"></script>
    <script src="/lib/jquery-ui/jquery-ui.min.js"></script>
@endSection

@section('styles')
    <link rel="stylesheet" href="/lib/selectize/dist/css/selectize.default.css">
    <link rel="stylesheet" href="/lib/wickedpicker/dist/wickedpicker.min.css">
    <link rel="stylesheet" href="/lib/jquery-ui/themes/base/jquery-ui.css">
@endSection

@section('post_scripts')
    <script>
        $('#screening-movie').selectize({
            create: false,
            sortField: 'text'
        });

        $( "#showing-date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });

        $('#showing-time').wickedpicker({
            twentyFour: true,
            title : 'Showing time',
            now : '{{old('showing_time') ? old('showing_time') : \Carbon\Carbon::parse($screening->show_time)->toTimeString()}}'
        });
    </script>
@endSection