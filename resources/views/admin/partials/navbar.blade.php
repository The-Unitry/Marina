<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">{{ trans('userinfo.toggle_navigation') }}</span>
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

                <!-- Dashboard -->
                <li class="{{ ($module == '') ? 'active' : '' }}">
                    <a href="{{ url('/admin') }}">
                        Dashboard
                    </a>
                </li>

                <!-- Harbour -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Haven <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li class=""><a href="{{ url('/admin/box') }}"><i class="fa fa-fw fa-th"></i> {{ trans('menu.boxes') }}</a></li>
                        <li class=""><a href="{{ url('/admin/scaffold') }}"><i class="fa fa-fw fa-map-signs"></i> {{ trans('menu.scaffolds') }}</a></li>
                        <li class=""><a href="{{ url('/admin/boat') }}"><i class="fa fa-fw fa-ship"></i> {{ trans('menu.boats') }}</a></li>
                        <li class=""><a href="{{ url('/admin/user') }}"><i class="fa fa-fw fa-users"></i> {{ trans('menu.users') }}</a></li>
                        <li class=""><a href="{{ url('/admin/reservation') }}"><i class="fa fa-fw fa-calendar-o"></i> {{ trans('menu.reservations') }}</a></li>
                        <li class=""><a href="{{ url('/admin/invoice') }}"><i class="fa fa-fw fa-money"></i> {{ trans('menu.invoices') }}</a></li>
                        <li class=""><a href="{{ url('/admin/newsletter/send') }}"><i class="fa fa-fw fa-envelope-o"></i> {{ trans('menu.newsletters') }}</a></li>
                    </ul>
                </li>

                <!-- Website -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Website <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li class=""><a href="{{ url('/admin/page') }}"><i class="fa fa-fw fa-file"></i> {{ trans('menu.pages') }}</a></li>
                        <li class=""><a href="{{ url('/admin/post') }}"><i class="fa fa-fw fa-newspaper-o"></i> {{ trans('menu.posts') }}</a></li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="{{ ($module == 'setting') ? 'active' : '' }}">
                    <a href="{{ url('/admin/setting') }}">
                        {{ trans('menu.settings') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-fw fa-desktop"></i> {{ trans('menu.view_site') }}</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-fw fa-sign-out"></i> {{ trans('menu.log_out') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
