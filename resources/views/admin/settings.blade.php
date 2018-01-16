@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Settings
                </h2>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/admin/settings" style="padding: 0px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>

                        <div class="">
                            <input id="name" type="text" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email</label>

                        <div class="">
                            <input id="email" type="text" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('phone_no') ? ' has-error' : '' }}">
                        <label for="phone_no" class="control-label">Phone No</label>

                        <div class="">
                            <input id="phone_no" type="text" name="phone_no" value="{{ old('phone_no') ? old('phone_no') : Auth::user()->phone_no }}">

                            @if ($errors->has('phone_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label for="gender" class="control-label">Gender</label>

                        <div class="">
                            <select name="gender" id="gender">
                                <option value="">Select</option>

                                <option value="male" {{old('gender')? old('gender') : Auth::user()->gender === 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender') ? old('gender') : Auth::user()->gender === 'female' ? 'selected' : ''}}>Female</option>
                            </select>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                        <label for="photo" class="control-label">Display Photo</label>

                        <div class="">
                            <input id="photo" type="file" name="photo">

                            @if ($errors->has('photo'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <span>
                                Update Settings
                            </span>
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endSection