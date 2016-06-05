<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') &middot; Navicula</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/bs/dt-1.10.12/datatables.min.css"/>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                Navicula
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/post') }}">Posts</a></li>
                <li><a href="{{ url('/admin/page') }}">Pages</a></li>
                <li><a href="{{ url('/admin/invoice') }}">Invoices</a></li>
                <li><a href="{{ url('/admin/reservation') }}">Reservations</a></li>
                <li><a href="{{ url('/admin/box') }}">Boxes</a></li>
                <li><a href="{{ url('/admin/boat') }}">Boats</a></li>
                <li><a href="{{ url('/admin/user') }}">Users</a></li>
                <li><a href="{{ url('/admin/scaffold') }}">Scaffolds</a></li>
                <li><a href="{{ url('/admin/setting') }}">Settings</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(Session::has('message'))
    <div class="alert alert-success" id="alert" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <span>{{ Session::get('message') }}</span>
    </div>
@endif

<div class="container">
    <div class="title-box">
        @if(sizeof(Request::segments()) == 2)
            <a href="{{ $module }}/create" class="btn btn-primary pull-right">
                <span class="fa fa-plus"></span> Create {{ $module }}
            </a>
        @endif
        <h3>@yield('title')</h3>
    </div>

    @yield('content')
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/u/bs/dt-1.10.12/datatables.min.js"></script>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
