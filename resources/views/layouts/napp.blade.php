<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FaunaTEC</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/napp.css') }}">

    <!-- JQuery & JQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">



    <script>
        $(function () {
            $('#termino').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('buscar.autocompletar') }}",
                        data: { termino: request.term },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 3,
                appendTo: ".search-form", // Hace que el dropdown esté contenido dentro del navbar
                select: function (event, ui) {
                    $('#termino').val(ui.item.value); // Rellenar el input con el valor seleccionado
                }
            });
        });
    </script>
</head>

<body>
    <div id="app">
        <!-- Barra de navegación fija en la parte superior -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="padding: 0.25rem 1rem;">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/Logo.png" alt="Logo" style="width:25px;">
                    </a>
                    <a class="navbar-link ms-2" href="{{ url('/') }}" style="font-size: 1rem; color: #8a2036;">Inicio</a>
                    <a class="navbar-link ms-2" href="{{ url('/animales') }}" style="font-size: 1rem; color: #8a2036;">Especies</a>
                    <a class="navbar-link ms-2" href="{{ url('/venfermedades') }}" style="font-size: 1rem; color: #8a2036;">Enfermedades</a>
                </div>

                <!-- Cuadro de búsqueda de especies -->
                <form action="{{ route('buscar') }}" method="GET" class="search-form">
                    <input type="text" name="termino" id="termino" class="search-input" placeholder="Buscar especies...">
                    <button type="submit" class="search-button">Buscar</button>
                </form>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm font-bold dark:text-gray-100 underline m-1"
                                        style="color: #8a2036; font-size: 0.9rem;">Iniciar Sesión</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="ml-3 text-sm font-bold dark:text-gray-300 underline m-1"
                                        style="color: #8a2036; font-size: 0.9rem;">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="text-sm font-bold dark:text-gray-100 underline m-1"
                                    style="color: #8a2036; font-size: 0.9rem;">Panel</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="ml-3 text-sm font-bold text-gray-300 underline dropdown-toggle"
                                    style="color: #8a2036; font-size: 0.9rem;" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end"
                                    style="background: #8a2036; border-radius: 0.5rem; padding: 0.5rem;"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-sm font-bold" style="color: #ffffff; font-size: 0.9rem;"
                                        href="{{ route('logout') }}"
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

        <main class="py-4" style="margin-top: 70px;">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="custom-footer">
            <div class="container">
                <div class="footer-text text-center mt-3">
                    © 2024 FaunaTEC. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
