<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- script -->
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a8b65ee465.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navPrincipal">
            <div class="container">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                <button class=" hamburger navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                class="fas fa-bars fa-1x"></i></span></button>

                 <!-- Collapsible content -->
                 
                    <div class="navMenu collapse" id="navbarSupportedContent1">

                    <!-- Links -->
                    <ul class="navbar-nav nav-fill">
                    <li class="enlace nav-item">
                            <a class=" nav-link" href="#">Vull Donar</a>
                        </li>
                        <li class="enlace nav-item">
                            <a class="nav-link" href="#">Vull Rebre</a>
                        </li>
                        <li class="enlace nav-item">
                            <a class="nav-link" href="#">Sobre Nosaltres</a>
                        </li>
                        <li class="enlace nav-item">
                            <a class="nav-link" href="#">Contacte</a>
                        </li>
                    </ul>
                    <!-- Links -->

                    </div>
                <!-- Collapsible content -->

                </ul>

                 
                <!-- Middle Of Navbar (Logo) -->
                <ul class="navbar-nav m-auto">
                    <a href="{{route('home')}}"> <img class="pontLogo" src="{{ asset('img/pont-logo.png') }}" alt="Pont Logo"/> </a>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="prueba navbar-nav ml-auto position-relative">
                    <!-- Authentication Links -->
                        @guest
                        <a class=" btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <path fill="#FFF" fill-rule="nonzero" d="M25 0C11.19 0 0 11.19 0 25s11.19 25 25 25 25-11.19 25-25S38.81 0 25 0zm0 9.677a8.871 8.871 0 1 1 0 17.743 8.871 8.871 0 0 1 0-17.743zm0 34.678c-5.917 0-11.22-2.682-14.768-6.875 1.895-3.569 5.605-6.028 9.93-6.028.241 0 .483.04.715.11 1.31.424 2.681.696 4.123.696 1.442 0 2.823-.272 4.123-.696.232-.07.474-.11.716-.11 4.324 0 8.034 2.46 9.93 6.028-3.55 4.193-8.852 6.875-14.769 6.875z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </div>
                    @endguest

                    @auth
                        @can('admin', Auth::user())
                            <li class="nav-item admin">
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <a class="nav-link" href="/petitions">{{ __('Sol·licituds') }}</a>
                                    </button>
                                    <div class="dropdown-content">
                                      <a href="/petitions">Acceptades</a>
                                      <a href="/petition-pending">Per validar</a>
                                    </div>
                                  </div> 
                            </li>
                            <li class="nav-item admin">
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <a class="nav-link" href="/batch/pending">{{ __('Donacions') }}</a>
                                    </button>
                                    <div class="dropdown-content">
                                      <a href="/batch">Acceptades</a>
                                      <a href="/batch/pending">Per validar</a>
                                      <a href="/batch/create">Crear nova donació</a>
                                    </div>
                                  </div> 
                            </li>
                        @endcan                      
                            
                        <li class="nav-item logout">
                            <a class="nav-link log" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ Auth::user()->entity_name }} 
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    
                </ul>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>


  <!-- footer-->
  <footer  class="page-footer font-small p-4">
      <div class="footerContent">
        <div>
            <a class="privacyPolicy" href="#">Política de privacitat i tractament de dades // Política de privacidad y tratamiento de datos</a>
        </div>
        <div>
            <p>©fundació Banc de Recursos</p>
        </div>
        <div class="icons">
            <a href="#" class="fab fa-twitter-square"></a>
            <a href="#" class="fab fa-facebook-square"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-youtube-square"></a>
        </div>
      </div>
  </footer>
</body>
</html>
