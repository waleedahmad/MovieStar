@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Add Food Item
                </h2>

                <a href="/admin/menu" class="btn btn-default">
                    <span>
                        Back
                    </span>
                </a>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/admin/menu" style="padding: 0px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Item Name</label>

                        <div class="">
                            <input id="name" type="text" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="control-label">Item Price</label>

                        <div class="">
                            <input id="price" type="text" name="price" value="{{ old('price') }}">

                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('prep_time') ? ' has-error' : '' }}">
                        <label for="prep_time" class="control-label">Preparation Time</label>

                        <div class="">
                            <input id="prep_time" type="text" name="prep_time" value="{{ old('prep_time') }}">

                            @if ($errors->has('prep_time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('prep_time') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('availability') ? ' has-error' : '' }}">

                        <div class="row">
                            <input type="checkbox"
                                   style="margin-left: 15px; width: auto "
                                   name="availability" value="available"
                                    {{old('availability') ? 'checked' : ''}}>
                            Available
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
                                Add Item
                            </span>
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endSection