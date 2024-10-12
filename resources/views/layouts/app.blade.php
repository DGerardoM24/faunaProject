<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FaunaTEC') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Estilos básicos para asegurar que el fondo cubra toda la pantalla */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Ajustar contenido para que no quede debajo de la barra de navegación fija */
        main {
             /* Ajusta este valor según la altura de tu barra de navegación */
            width: 100%; /* Asegura que el main ocupe el 100% del ancho */
            display: flex;
            justify-content: center; /* Centra horizontalmente el contenido */
        }
    </style>
</head>

<body>
    <div id="app">
         <!-- Fija la barra de navegación en la parte superior con la clase "fixed-top" -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/Logo.png" alt="Sari" style="width: 25px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="text-sm font-bold dark:text-gray-100 underline m-3" style="color: #8a2036">Panel</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm font-bold dark:text-gray-100 underline m-3" style="color: #8a2036">Iniciar Sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="ml-4 text-sm font-bold dark:text-gray-300 underline m-3" style="color: #8a2036">Registrarse</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="ml-4 text-sm font-bold text-gray-300 underline dropdown-toggle" style="color: #8a2036;" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" style="background: #8a2036; border-radius: 0.5rem; padding: 0.5rem;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-sm font-bold" style="color: #ffffff;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- Contenedor para el contenido principal -->
            @yield('content')
        </main>
    </div>
</body>

</html>
