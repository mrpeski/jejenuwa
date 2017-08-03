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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .nav > li > a:hover, .nav > li > a:focus {
        background: transparent;
    }
    </style>
</head>
<body style="-webkit-font-smoothing:antialiased;">
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}" style="padding: 20px 120px; width:250px">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                        <img class="logo" src="{{asset('default/Forth_Jejenuwa_Logo.png')}}" alt="Forth Jejenuwa Company" style="margin:0">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                     @if(false)
                            {!! getNav(getMenus('menu288')) !!}
                    @endif
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (!Auth::guest())
                            <li><a href="{{ route('dash') }}">Dashboard</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer style="min-height:300px; background: #0d1226; position:relative; top:300px; left:0">
        <div class="container">
         <div class="col-lg-4 box" style="float:left; padding:20px;">
            <img src="{{asset('default/Forth_Jejenuwa_Logo.png')}}" alt="Forth Jejenuwa Company">  
        </div> 
        <div class="col-lg-8">     
         <div class="col-lg-6 box" style="float:left; padding:20px;height:200px">
            <h2 style="color:#6d6760;font-size:18px;margin-top:0;">CONNECT</h2>
            <ul class="nav">
                <li>
                    <a href="#">Twitter</a>
                </li>
                <li>
                    <a href="">LinkedIn</a>
                </li>
                <li>
                    <a href="">Facebook</a>
                </li>
            </ul>
        </div>
         <div class="col-lg-6 box" style="float:left; padding:20px;height:200px">
            <h2 style="color:#6d6760;font-size:18px;margin-top:0;">SITE LINKS</h2>
            <ul class="nav">
                <li>
                    <a href="#">lorem ipsum</a>
                </li>
                <li>
                    <a href="">dolor ime</a>
                </li>
                <li>
                    <a href="">tries bien</a>
                </li>
            </ul>
        </div>
        <form action="">
        <input type="text" placeholder="Search" class="form-control" style="background:transparent; font-size: 30px; border:none; border-bottom:1px solid #6d6760;">
        </form>
        </div>
        </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('modular_script')
</body>
</html>
