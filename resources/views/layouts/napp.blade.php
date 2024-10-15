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
    <style>
        /* Estilo para el pie de página */
        .custom-footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            /* Aumentar el espaciado superior e inferior */
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
            /* Tamaño de texto más legible */
            color: #333;
            /* Color de texto más oscuro */
        }

        .footer-links h4,
        .footer-icons h4 {
            font-size: 1.2rem;
            /* Tamaño de encabezado mayor */
            margin-bottom: 1rem;
            /* Espaciado inferior */
            color: #8a2036;
            /* Color del título */
        }

        .footer-links a,
        .footer-icons a {
            color: #8a2036;
            /* Color de los enlaces */
            text-decoration: none;
            /* Sin subrayado */
            transition: color 0.3s;
            /* Transición de color */
        }

        .footer-links a:hover,
        .footer-icons a:hover {
            color: #5a141e;
            /* Color más oscuro al pasar el mouse */
            text-decoration: underline;
            /* Subrayado al pasar el mouse */
        }

        .footer-icons img {
            width: 30px;
            /* Aumentar tamaño de iconos */
            margin: 0 10px;
            /* Espaciado entre iconos */
            transition: transform 0.3s;
            /* Transición al pasar el mouse */
        }

        .footer-icons img:hover {
            transform: scale(1.1);
            /* Efecto de zoom al pasar el mouse */
        }

        .footer-text {
            margin-top: 1rem;
            /* Espaciado superior para el texto de derechos */
            font-size: 0.9rem;
            /* Tamaño de texto para derechos */
            color: #777;
            /* Color más claro para derechos */
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Barra de navegación fija en la parte superior -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top" style="padding: 0.25rem 1rem;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/Logo.png" alt="Sari" style="width:25px;"> <!-- Reducir el tamaño del logo -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="ml-2">
                    <h5 class="text-lg font-bold" style="font-size: 1rem;">FaunaTEC</h5>
                    <!-- Ajustar el tamaño de la fuente -->
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}"
                                        class="text-sm font-bold dark:text-gray-100 underline m-1"
                                        style="color: #8a2036; font-size: 0.9rem;">Iniciar Sesión</a>
                                    <!-- Reducir margen y tamaño de fuente -->
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"
                                        class="ml-3 text-sm font-bold dark:text-gray-300 underline m-1"
                                        style="color: #8a2036; font-size: 0.9rem;">Registrarse</a>
                                    <!-- Reducir margen y tamaño de fuente -->
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="text-sm font-bold dark:text-gray-100 underline m-1"
                                    style="color: #8a2036; font-size: 0.9rem;">Panel</a>
                                <!-- Reducir margen y tamaño de fuente -->
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
            <!-- Contenedor para el contenido principal -->
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="custom-footer">
            <div class="container text-center">
                <div class="footer-links">
                    <h4>Contáctanos</h4>
                    <h5>
                        <a href="mailto:info@faunatec.com">info@faunatec.com</a>
                    </h5>
                    <h5>
                        <a href="tel:+123456789">(+1) 234-567-89</a>
                    </h5>
                </div>
                <div class="footer-icons">
                    <h4>Redes Sociales</h4>
                    <a href="https://www.facebook.com/FaunaTEC" target="_blank">
                        <img src="/images/facebook.png" alt="Facebook">
                    </a>
                    <a href="https://www.twitter.com/FaunaTEC" target="_blank">
                        <img src="/images/x.png" alt="Twitter">
                    </a>
                    <a href="https://www.instagram.com/FaunaTEC" target="_blank">
                        <img src="/images/instagram.png" alt="Instagram">
                    </a>
                </div>
                <div class="footer-text">
                    <p>© 2024 FaunaTEC. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>