@extends('layout')

@section('content')
    <div class="wrapper user">

        @include('navbar')

        <div id="content_hero" style="background-image: url(img/hero-contact.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section movies">
            <form class="col-sm-12 col-md-6 col-lg-6" method="post" action="/settings" style="padding: 0px; float:none; margin: 0 auto;" enctype="multipart/form-data">
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


        @include('footer')
    </div>
@endSection