<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Draft.css') }}" rel="stylesheet">
    <link href="{{ asset('css/RichEditor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/min/basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/min/dropzone.min.css') }}" rel="stylesheet">
</head>
<style>

@media (min-width: 768px)
.sidebar {
    position: fixed;
    top: 89px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
    width: 150px;
}
.breadcrumb {
    background: transparent;
    padding-left: 0;
}
.primary-link {
    background: #20f41f;
    padding: 3px 3px;
    border-radius: 2px;
    box-shadow: 2px 1px #222;
    margin-bottom: 10px;
    color: #0c1013;
}

.well {
    background: #5a4a4a;
}

.btn-default {
    background: #222;
    color: #ccc;
    border-color: transparent;
}

.btn-default:hover {
    background: #444;
}
.primary-link:hover {
    text-decoration: none;
}
.nav-sidebar {
    background: #222;
}

.nav-sidebar a {
    color: #777;
}

.nav-sidebar > li.nav-header h4{
    font-size: 0.8em;
    font-weight: 500;
    padding: 5px 15px;
}

.nav-sidebar >li > a:hover {
    background: transparent;
    color:#ce627f;
}

.label {
    display: none;
}

.title {
    border-width: 0px solid transparent;
    border-bottom-width: 2px;
    background: transparent;
    border-bottom: 2px solid #000;
}

.content {
    padding: 90px;
    padding-top: 120px;
    border-radius: 0;
    min-height: 900px;
}
</style>

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
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('login') }}">Who we are</a></li>
                    <li><a href="{{ route('login') }}">Our Roster</a></li>
                    <li><a href="{{ route('login') }}">Contact Us</a></li>
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

        <!-- <ul class="breadcrumb" style="margin-top: -22px; border-radius: 0;background:#2e2c2c">
            <li><a href="/">Home</a></li>
            @foreach(Request::segments() as $index => $segment)
                <li class="{{ ($index === 1)  ? 'active' : '' }}"><a href="{{$segment}}">{{ucfirst($segment)}}</a></li>
            @endforeach
        </ul> -->

        <!-- Sidebar -->
        <div class="col-sm-3 col-md-2 sidebar" style="width:150px; background: #222;">
          <ul class="nav nav-sidebar">
          <li class="nav-header">
              <h4 >MANAGE INVENTORY</h4>
            </li>
            <li class="active"><a href="{{route('dash')}}">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="{{route('Product_flow')}}">FLOW</a></li>
            <li><a href="{{route('Ship_arrivals')}}">INFORMATION</a></li>
            <li><a href="{{route('Product_index')}}">INSIGHT</a></li>
            <li><a href="{{route('Warehouse_index')}}">Warehouse</a></li>
          </ul>
          <ul class="nav nav-sidebar" style="border-top: 1px solid #555">
          <li class="nav-header">
              <h4 >MANAGE CORE</h4>
          </li>
            <li><a href="{{route('Page_index')}}">Pages</a></li>
            <li><a href="{{route('Menu_index')}}">Menu</a></li>
            <li><a href="{{route('Media_index')}}">Media</a></li>
            <li><a href="{{route('Staff_index')}}">Staff</a></li>
          </ul>
          <ul class="nav nav-sidebar" style="border-top: 1px solid #555">
           <li class="nav-header">
              <h4 >MISC</h4>
            </li>
            <li><a href="{{route('Bin_index')}}">Bin</a></li>
            <li><a href="{{route('Setting_index')}}">Site Settings</a></li>
            <li><a href="">Logout</a></li>
          </ul>
        </div>
        <div class="col-lg-9">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
         @endif
        @yield('content')
        </div>
        <!-- <footer style="min-height:300px; background: #000; position:relative; top:300px; left:0">
        
        </footer> -->
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>

    @yield('modular_script')
</body>
</html>
