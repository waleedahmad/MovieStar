<div class="admin-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-2">


    <a @if(Request::is('admin/now_playing')) class="active" @endif  href="/admin/now_playing">
        <i class="material-icons">movie</i> Now Playing
    </a>

    <a @if(Request::is('admin/coming_soon')) class="active" @endif href="/admin/coming_soon">
        <i class="material-icons">watch_later</i> Coming Soon
    </a>

    <a @if(Request::is('admin/staff')) class="active" @endif  href="/admin/staff">
        <i class="material-icons">supervisor_account</i> Staff
    </a>

    <a @if(Request::is('admin/users')) class="active" @endif href="/admin/users">
        <i class="material-icons">account_circle</i> Users
    </a>

</div>