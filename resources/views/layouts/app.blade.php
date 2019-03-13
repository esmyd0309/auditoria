<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DANPLUS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/laravel.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    
footer {
   
        width: 100%;
        bottom: 0;
        position:fixed;
 
  
}
body {
        background-image: url("http://192.168.1.107/auditoria/public/fondos.jpg");
    }

.form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
   

</style>

</head>
<body>
    <div id="app">
        <br>
        <div class="container">
        <div class="row">
        <div class="col-md-12 col-md-offset-2">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <a class="navbar-brand" href="{{ url('/') }}" style="background-color: #d7f3e3;">
                   <img src="http://192.168.1.107/auditoria/public/logo.jpg" alt="DatamarketingPlus">
                </a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @can('plantillas.index')

                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="#">Plantillas</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('plantillas.index') }}">Lista</a>
                                <a class="dropdown-item" href="{{ route('plantillas.create') }}">Crear</a>

                            </div>
                        </li>
                        
                        @endcan

                        @can('gestion')
                        
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="#">Tareas</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('tarea') }}">Lista</a>
                                <a class="dropdown-item" href="{{ route('tarea.create') }}">Crear</a>
                            
                            </div>
                        </li>

                        
                      
                        @endcan
                        @can('users.index')
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                   <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>
        </div>
         </div> </div>
        <main class="py-4">
        @if(session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="alert alert-success">
                      <center> {{ session('info') }}</center> 
                    </div>
                </div>
            </div>
        </div>
    @endif
            @yield('content')
        </main>
    </div>
    <br>

    <!-- Footer -->
<footer class="page-footer font-small blue" style="background-color: #e3f2fd;">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2018 Copyright: GregorioOsorio
  <a href="#"> gregorioenrique14@gmail.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<script>


</script>
</body>
</html>
