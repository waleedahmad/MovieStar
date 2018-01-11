@extends('layout')

@section('content')
    <div class="wrapper admin">
        @include('admin.navbar')

        @include('admin.sidebar')

        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10 content">
            <div class="row">
                <div class="col-sm-12">
                    <hr class="space-40">
                    <div class="row">
                        @if(Auth::user()->role === 'admin')
                            <div class="col-sm-3">
                                <div class="icon-box">
                                    <i class="material-icons">movie</i>
                                    <h4>Movies Database</h4>
                                    <h4>{{\App\Movies::count()}}</h4>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="icon-box">
                                    <i class="material-icons">watch_later</i>
                                    <h4>Screening</h4>
                                    <h4>{{\App\Screenings::count()}}</h4>

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="icon-box">
                                    <i class="material-icons">supervisor_account</i>
                                    <h4>Staff</h4>
                                    <h4>{{\App\User::where('role', '=', 'staff')->count()}}</h4>
                                </div>
                            </div>


                        @else

                            <div class="col-sm-3">
                                <div class="icon-box">
                                    <i class="material-icons">account_circle</i>
                                    <h4>Customers</h4>
                                    <h4>{{\App\User::where('role', '=', 'user')->count()}}</h4>
                                </div>
                            </div>

                        @endif
                    </div>

                    <div class="row" style="margin-top: 30px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection