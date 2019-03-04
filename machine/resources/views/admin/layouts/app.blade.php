<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-white navbar-white fixed-top">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (Auth::guard('admin')->guest())
                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin.login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link"  href="{{ route('admin.register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle dropdown-item" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li class="dropdown-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    

                </ul>
            </div>
        </nav>

        <div style="margin-top:80px">
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('dist/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
