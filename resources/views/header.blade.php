<div class="navbar banner--clone" role="navigation">
    <div class="heading">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{--<div class="search">
                        <a href="https://www.klevermedia.co.uk/html_templates/movie_star_html/index.html#">
                            <i class="material-icons">search</i>
                        </a>
                    </div>--}}
                    <div class="tel">
                        <a href="tel:03014377011">
                            <i class="material-icons">phone in talk</i>03014377011
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="logo" title="Movie Star">
                <img src="/img/logo.svg" alt="Movie Star">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul id="menu-primary" class="nav navbar-nav" style="margin-top: -24.5px;">
                <li @if(Request::is('/'))class="active" @endif>
                    <a href="/">Home</a>
                </li>
                <li @if(Request::is('whats-on'))class="active" @endif>
                    <a href="/whats-on">What's on</a>
                </li>

                <li @if(Request::is('contact'))class="active" @endif>
                    <a href="/contact">Contact</a>
                </li>

                @if(Auth::checK())
                    @if(Auth::user()->role === 'admin')
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    @elseif(Auth::user()->role === 'staff')
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    @else
                        <li>
                            <a href="/reservations">Reservations</a>
                        </li>
                    @endif
                @endif

                @if(Auth::checK())
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                @else
                    <li>
                        <a href="/login">Login</a>
                    </li>

                    <li>
                        <a href="/register">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>