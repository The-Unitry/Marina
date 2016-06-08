<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ setting('company_name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    @include('admin.partials.confirmation')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">{{ trans('userinfo.toggle_navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="hidden-sm hidden-md hidden-lg">{{ setting('company_name') }}</span>
                    <img class="img-responsive hidden-xs logo-img" src="/media/logo/logo.png"/>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}">{{ trans('navigation.home') }}</a></li>
                    <li><a href="{{ url('/reserveren') }}">{{ trans('navigation.reserve') }}</a></li>
                    @if(Auth::check())
                        <li><a href="{{ url('/mijn-boten') }}">{{ trans('navigation.my_boats') }}</a></li>
                    @endif
                    <li><a href="{{ url('/contact') }}">{{ trans('navigation.contact') }}</a></li>
                    @if(Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('navigation.my_account') }}</a></li>
                    @endif
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ trans('navigation.my_account') }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ trans('navigation..log_out') }}</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrap">
        @yield('content')
    </div>

    <div class="footer">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Docking With A Breeze</h3>
                    <hr>
                    <small class="copyright">Copyright &copy; LINK 2016 | Alle rechten voorbehouden</small>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.scripts')
</body>
</html>
