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
        /* Estilos básicos para asegurar que el fondo cubra toda la pantalla */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        /* Ajustar contenido para que no quede debajo de la barra de navegación fija */
        main {
            /* Ajusta este valor según la altura de tu barra de navegación */
            padding-top: 50px;
            width: 100%;
            /* Asegura que el main ocupe el 100% del ancho */
            display: flex;
            justify-content: center;
            /* Centra horizontalmente el contenido */
        }

        /* Reducir el tamaño de la barra de navegación */
        .navbar {
            font-size: 0.85em;
            padding: 0.5rem 1rem;
        }

        /* Reducir el tamaño del título */
        .navbar h4 {
            font-size: 1.2em;
            margin: 0;
        }

        /* Ajuste de los enlaces del menú */
        .menu-link {
            background-color: #b91c1c;
            color: white;
            border-bottom: 1px solid #55212e;
            padding: 8px 12px;
            font-size: 0.95em;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Efecto hover en los enlaces */
        .menu-link:hover {
            background-color: #e63946;
            color: white;
            border-bottom: 1px solid #8a2036;
        }

        /* Mejoras generales en la tarjeta */
        .card {
            border-radius: 8px;
            overflow: hidden;
        }

        /* Estilo para el encabezado */
        .card-header {
            font-weight: bold;
            text-align: center;
            font-size: 1.2em;
            text-transform: uppercase;
        }

        /* Estilos para el footer */
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
        .search-form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-input {
            border: 1px solid #8a2036;
            /* Borde en color principal */
            padding: 0.5rem 1rem;
            border-radius: 20px;
            /* Borde redondeado */
            font-size: 0.9rem;
            color: #333;
            /* Texto oscuro */
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .search-input:focus {
            border-color: #5a141e;
            /* Color más oscuro al enfocar */
            box-shadow: 0 0 5px rgba(138, 32, 54, 0.4);
            /* Sombra sutil */
            outline: none;
        }

        .btn-search {
            background-color: #8a2036;
            /* Color de fondo del botón */
            color: #ffffff;
            /* Color de texto */
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 20px;
            /* Borde redondeado */
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .btn-search:hover {
            background-color: #5a141e;
            /* Fondo más oscuro al pasar el mouse */
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Barra de navegación fija en la parte superior -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/Logo.png" alt="Sari" style="width:25px;">
                        <!-- Reducir el tamaño del logo -->
                    </a>
                    <a class="navbar-link ms-2" href="{{ url('/') }}"
                        style="font-size: 1rem; color: #8a2036;">Inicio</a>
                    <a class="navbar-link ms-2" href="{{ url('/animales') }}"
                        style="font-size: 1rem; color: #8a2036;">Especies</a>
                    <a class="navbar-link ms-2" href="{{ url('/venfermedades') }}"
                        style="font-size: 1rem; color: #8a2036;">Enfermedades</a>
                </div>

                <!-- Cuadro de búsqueda de especies -->
                <form action="{{ route('buscar') }}" method="GET" class="d-flex ms-3 search-form">
                    <input type="text" name="termino" placeholder="Buscar especies..." required class="form-control search-input">
                    <button type="submit" class="btn btn-search">Buscar</button>
                </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm font-bold underline m-2"
                                        style="color: #8a2036">
                                        Iniciar Sesión
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="ml-4 text-sm font-bold underline m-2"
                                        style="color: #8a2036">
                                        Registrarse
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="text-sm font-bold underline m-2"
                                    style="color: #8a2036">
                                    Panel
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="ml-4 text-sm font-bold underline dropdown-toggle"
                                    style="color: #8a2036;" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end"
                                    style="background: #8a2036; border-radius: 0.5rem; padding: 0.5rem;"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-sm font-bold text-white" href="{{ route('logout') }}"
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
            <!-- Columna con el menú de navegación -->
            <div class="col-md-3" style="margin-top: 50px;">
                <div class="card shadow-sm" style="border: 1px solid #55212e; border-radius: 8px;">
                    <div class="card-header"
                        style="background-color: #8a2036; color: white; font-weight: bold; text-align: center; font-size: 1.2em;">
                        {{ __('Menu') }}
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="/especies" class="list-group-item list-group-item-action menu-link">Especies</a>
                        <a href="/asigna-multimedia" class="list-group-item list-group-item-action menu-link">Asignar
                            Imágenes</a>
                        <a href="/asigna-enfermedades" class="list-group-item list-group-item-action menu-link">Asignar
                            Enfermedades</a>
                        <a href="/asigna-rutas" class="list-group-item list-group-item-action menu-link">Asignar
                            Rutas</a>
                        <a href="/banderas" class="list-group-item list-group-item-action menu-link">Banderas</a>
                        <a href="/tipo-enfermedades" class="list-group-item list-group-item-action menu-link">Tipos de
                            Enfermedades</a>
                        <a href="/clases" class="list-group-item list-group-item-action menu-link">Clases</a>
                        <a href="/ordenes" class="list-group-item list-group-item-action menu-link">Ordenes</a>
                        <a href="/estados-conservacions"
                            class="list-group-item list-group-item-action menu-link">Estados de Conservación</a>
                        <a href="/entornos" class="list-group-item list-group-item-action menu-link">Entornos</a>
                        <a href="/dietas" class="list-group-item list-group-item-action menu-link">Dietas</a>
                        <a href="/familias" class="list-group-item list-group-item-action menu-link">Familias</a>
                        <a href="/rutas" class="list-group-item list-group-item-action menu-link">Rutas</a>
                        <a href="/multimedia" class="list-group-item list-group-item-action menu-link">Multimedia</a>
                        <a href="/enfermedades"
                            class="list-group-item list-group-item-action menu-link">Enfermedades</a>
                        <a href="/grupos" class="list-group-item list-group-item-action menu-link">Grupos</a>
                    </div>
                </div>
            </div>

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
