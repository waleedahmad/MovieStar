<div class="admin-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-2">


    <a @if(Request::is('admin/movies*')) class="active" @endif  href="/admin/movies">
        <i class="material-icons">movie</i> Movies
    </a>

    <a @if(Request::is('admin/screenings')) class="active" @endif href="/admin/screenings">
        <i class="material-icons">movie</i> Screenings
    </a>

    <a @if(Request::is('admin/staff')) class="active" @endif  href="/admin/staff">
        <i class="material-icons">supervisor_account</i> Staff
    </a>

    <a @if(Request::is('admin/admins')) class="active" @endif href="/admin/admins">
        <i class="material-icons">verified_user</i> Admins
    </a>

    <a @if(Request::is('admin/users')) class="active" @endif href="/admin/users">
        <i class="material-icons">account_circle</i> Customers
    </a>

    <a @if(Request::is('admin/reports')) class="active" @endif href="/admin/reports">
        <i class="material-icons">assessment</i> Reports
    </a>

</div>