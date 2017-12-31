@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Add Movie
                </h2>

                <a href="/admin/movies" class="btn btn-default">
                    <span>
                        Back
                    </span>
                </a>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/admin/movies" style="padding: 0px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Movie Name</label>

                        <div class="">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year" class="control-label">Release Year</label>

                        <div class="">
                            <input id="year" type="text" name="year" value="{{ old('year') }}">

                            @if ($errors->has('year'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('director') ? ' has-error' : '' }}">
                        <label for="director" class="control-label">Director Name</label>

                        <div class="">
                            <input id="director" type="text" name="director" value="{{ old('director') }}">

                            @if ($errors->has('director'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('director') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('youtube_url') ? ' has-error' : '' }}">
                        <label for="youtube_url" class="control-label">Youtube Trailer URL</label>

                        <div class="">
                            <input id="youtube_url" type="text" name="youtube_url" value="{{ old('youtube_url') }}">

                            @if ($errors->has('youtube_url'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('youtube_url') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    {{--Audience--}}

                    <div class="form-group {{ $errors->has('audience') ? ' has-error' : '' }}">
                        <label for="audience" class="control-label">Audience</label>

                        <div class="">
                            <select name="audience" id="audience">
                                <option value="" {{old('audience') === '' ? 'selected' : ''}}>Select</option>
                                <option value="G" {{old('audience') === 'G' ? 'selected' : ''}}>G - General Audiences</option>
                                <option value="PG" {{old('audience') === 'PG' ? 'selected' : ''}}>PG – Parental Guidance Suggested</option>
                                <option value="PG-13" {{old('audience') === 'PG-13' ? 'selected' : ''}}>PG-13 – Parents Strongly Cautioned</option>
                                <option value="R" {{old('audience') === 'R' ? 'selected' : ''}}>R – Restricted</option>
                                <option value="NC-17" {{old('audience') === 'NC-17' ? 'selected' : ''}}>NC-17 – Adults Only</option>


                            </select>

                            @if ($errors->has('audience'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('audience') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="control-label">Description</label>

                        <div class="">
                            <input id="description" type="text" name="description" value="{{ old('description') }}">

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group {{ $errors->has('plot') ? ' has-error' : '' }}">
                        <label for="plot" class="control-label">Plot</label>

                        <div class="">
                            <textarea id="plot" name="plot">{{ old('plot') }}</textarea>

                            @if ($errors->has('plot'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('plot') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                        <label for="facebook" class="control-label">Facebook Page (Optional)</label>

                        <div class="">
                            <input id="facebook" type="text" name="facebook" value="{{ old('facebook') }}">

                            @if ($errors->has('facebook'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                        <label for="twitter" class="control-label">Twitter Page (Optional)</label>

                        <div class="">
                            <input id="twitter" type="text" name="twitter" value="{{ old('twitter') }}">

                            @if ($errors->has('twitter'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('starring') ? ' has-error' : '' }}">
                        <label for="starring" class="control-label">Starring Actors (Separated By Commas)</label>

                        <div class="">
                            <input id="starring" type="text" name="starring" value="{{ old('starring') }}">

                            @if ($errors->has('starring'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('starring') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('running_time') ? ' has-error' : '' }}">
                        <label for="running_time" class="control-label">Running Time (Minutes)</label>

                        <div class="">
                            <input id="running_time" type="text" name="running_time" value="{{ old('running_time') }}">

                            @if ($errors->has('running_time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('running_time') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('display_photo') ? ' has-error' : '' }}">
                        <label for="display_photo" class="control-label">Display Photo</label>

                        <div class="">
                            <input id="display_photo" type="file" name="display_photo">

                            @if ($errors->has('display_photo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('display_photo') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('poster') ? ' has-error' : '' }}">
                        <label for="poster" class="control-label">Poster Photo</label>

                        <div class="">
                            <input id="poster" type="file" name="poster">

                            @if ($errors->has('poster'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('poster') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('genre') ? ' has-error' : '' }}">
                        <label for="poster" class="control-label">Genres</label>

                        <div class="row">
                            @foreach(\App\Genres::all() as $genre)
                                <div class="col-xs-6">
                                    <input type="checkbox"
                                           style="margin-left: 10px; width: auto "
                                           name="genre[]" value="{{$genre->id}}"
                                           {{old('genre') ?  in_array($genre->id, old('genre')) ? 'checked' : '' : ''}}>
                                    {{$genre->name}}
                                </div>
                            @endforeach
                        </div>

                        @if ($errors->has('genre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('genre') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <span>
                                Save Movie
                            </span>
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endSection