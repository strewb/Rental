<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Online Rental</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    <a href="{!! URL::to('') !!}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="{{ (Request::is('about') ? 'active' : '') }}">
                    <a href="{!! URL::to('about') !!}">
                        <i class="glyphicon glyphicon-bookmark"></i> About</a></li></a>
                </li>
                {{--add a new header menu--}}
                <li class="{{ (Request::is('pricing') ? 'active' : '') }}">
                    <a href="{!! URL::to('pricing') !!}">
                        <i class="glyphicon glyphicon-bookmark"></i> Pricing</a></li></a>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="{{ (Request::is('place/create') ? 'active' : '') }}">
                    <a href="{!! URL::to('place/create') !!}"> <i class="glyphicon glyphicon-plus"></i> List Your Place</a>
                </li>
                @if (Auth::guest())
                    <li class="{{ (Request::is('auth/login') ? 'active' : '') }}">
                        <a href="{!! URL::to('auth/login') !!}">
                            <i class="fa fa-sign-in"></i> Login</a></li>
                    <li class="{{ (Request::is('auth/register') ? 'active' : '') }}"><a
                                href="{!! URL::to('auth/register') !!}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} <i
                                    class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--here we check the login user if found the login user check its admin or not if its admin then only show the dashboard link--}}
                            @if(Auth::check())
                                @if(Auth::user()->admin==1)
                                    <li>
                                        <a href="{!! URL::to('admin/dashboard') !!}"><i class="fa fa-tachometer"></i> Dashboard</a>
                                    </li>
                                @endif
                                <li role="presentation" class="divider"></li>
                            @endif
                            <li>
                                <a href="{!! URL::to('auth/logout') !!}"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>