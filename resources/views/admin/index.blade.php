@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Admin (Stats)</h2>
                    <hr class="space-40">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="icon-box">
                                <i class="material-icons">movie</i>
                                <h4>Now Playing</h4>
                                <h4>71</h4>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="icon-box">
                                <i class="material-icons">watch_later</i>
                                <h4>Coming Soon</h4>
                                <h4>4</h4>

                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="icon-box">
                                <i class="material-icons">supervisor_account</i>
                                <h4>Staff</h4>
                                <h4>4</h4>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="icon-box">
                                <i class="material-icons">account_circle</i>
                                <h4>Users</h4>
                                <h4>4</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 30px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection