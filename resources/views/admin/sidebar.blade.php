<div class="admin-sidebar col-xs-12 col-sm-12 col-md-4 col-lg-2">


    @if(Auth::user()->role === 'admin')
        <a @if(Request::is('admin/movies*')) class="active" @endif  href="/admin/movies">
            <i class="material-icons">movie</i> Movies
        </a>

        <a @if(Request::is('admin/screenings*')) class="active" @endif href="/admin/screenings">
            <i class="material-icons">movie</i> Screenings
        </a>

        <a @if(Request::is('admin/admins*')) class="active" @endif href="/admin/admins">
            <i class="material-icons">verified_user</i> Admins
        </a>

        <a @if(Request::is('admin/staff*')) class="active" @endif  href="/admin/staff">
            <i class="material-icons">supervisor_account</i> Staff
        </a>
    @endif


    <a @if(Request::is('admin/users*')) class="active" @endif href="/admin/users">
        <i class="material-icons">account_circle</i> Customers
    </a>

    @if(Auth::user()->role === 'admin')
        <a @if(Request::is('admin/reports*')) class="active" @endif href="/admin/reports">
            <i class="material-icons">assessment</i> Reports
        </a>
    @endif

    @if(Auth::user()->role === 'staff')
        <a @if(Request::is('admin/screenings*')) class="active" @endif href="/admin/screenings/tickets">
            <i class="material-icons">view_list</i> Screening Tickets
        </a>


        <a @if(Request::is('admin/menu*')) class="active" @endif href="/admin/menu">
            <i class="material-icons">restaurant_menu</i> Food Menu
        </a>

            <a @if(Request::is('admin/orders*')) class="active" @endif href="/admin/orders">
                <i class="material-icons">restaurant_menu</i> Food Orders
            </a>
    @endif



</div>