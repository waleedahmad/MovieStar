@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="title">
                <h2>
                    Add Staff
                </h2>

                <a href="/admin/staff" class="btn btn-default">
                    <span>
                        Back
                    </span>
                </a>
            </div>

            <div>
                <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/admin/staff" style="padding: 0px;" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Staffer Name</label>

                        <div class="">
                            <input id="name" type="text" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Staffer Email</label>

                        <div class="">
                            <input id="email" type="text" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Staffer Password</label>

                        <div class="">
                            <input id="password" type="password" name="password" value="{{ old('password') }}">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <label for="confirm_password" class="control-label">Confirm Password</label>

                        <div class="">
                            <input id="confirm_password" type="password" name="confirm_password" value="{{ old('confirm_password') }}">

                            @if ($errors->has('confirm_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('phone_no') ? ' has-error' : '' }}">
                        <label for="phone_no" class="control-label">Phone No</label>

                        <div class="">
                            <input id="phone_no" type="text" name="phone_no" value="{{ old('phone_no') }}">

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

                                <option value="male" {{old('gender') === 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{old('gender') === 'female' ? 'selected' : ''}}>Female</option>
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
                                Add Staff
                            </span>
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endSection