<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="shortcut icon" href="{{url('images/icon.ico')}}"/>
    <title>Panel Wolosky</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@if(session()->has('verificado'))
<script> alert('Edad de los clientes verificada');</script>
@endif

@if(session()->has('fechas'))    
   <script>             
       alert('Se establecerieron: #' + {{session('fechas')}} + " nacimientos");
   </script>
@endif
    
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
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        Wolosky Panel
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                

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
                    </ul>
                </div>
            </div>
        </nav>
        @if(!Auth::guest())
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <h4>Noticias</h4>
                <ul>
                    <li><a href="{{ url('noticias/create')}}">Crear Nota</a></li>
                    <li><a href="{{ url('admin/noticias/list')}}">Lista de Noticias</a></li>
                </ul>
                
                <h4>Clientes</h4>
                <ul>
                    <li><a href="{{ url('/clientes/create')}}">Crear cliente</a></li>
                    <li><a href="{{ url('/clientes')}}">Lista de clientes</a></li>
                    <li><a href="{{ url('/nacimiento')}}">Establecer Nacimiento</a></li>
                    <li><a href="{{ url('/edad')}}">Verificar Edad</a></li>
                </ul>
            </div>
            
            <div class="col-xs-12 col-md-9">
                
            @yield('content')
            </div>
        
        </div>
        @else
        @yield('content')
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
