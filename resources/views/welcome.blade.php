<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">


    <script>
        let currentIndex = 0;

        function slideCarousel() {
            const carousel = document.querySelector('.carousel-images');
            const images = document.querySelectorAll('.carousel-images img');
            const totalImages = images.length;

            // Calcula la posición de desplazamiento
            currentIndex = (currentIndex + 1) % totalImages;
            const offset = currentIndex * -100;

            // Aplica la transformación
            carousel.style.transform = `translateX(${offset}%)`;
        }

        // Ejecuta la función cada 3 segundos
        setInterval(slideCarousel, 3000);N
    </script>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        // Cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const toggleButton = document.getElementById('navbarDropdown');
            if (!dropdown.contains(event.target) && !toggleButton.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $('#termino').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('buscar.autocompletar') }}",
                        data: {
                            termino: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 3,
                select: function(event, ui) {
                    // Opcional: manejar cuando el usuario selecciona una opción
                    $('#termino').val(ui.item.value);
                }
            });
        });
    </script>



</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <header class="custom-header flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <!-- Logo -->
                <img src="/images/Logo.png" alt="Sari" style="width: 50px">
                <div class="ml-6">
                    <h1 class="text-xl font-bold">FaunaTEC</h1>
                </div>
            </div>
            <a class="text-sm font-bold underline" href="{{ url('/') }}">Inicio</a>
            <a class="text-sm font-bold underline" href="{{ url('/animales') }}">Especies</a>
            <a class="text-sm font-bold underline" href="{{ url('/venfermedades') }}">Enfermedades</a>

            <form action="{{ route('buscar') }}" method="GET" class="search-form">
                <input type="text" name="termino" id="termino" class="search-input"
                    placeholder="Buscar especies...">
                <button type="submit" class="search-button">Buscar</button>
            </form>



            <!-- Navigation links -->
            @if (Route::has('login'))
                <div class="flex items-center space-x-4">

                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="text-sm font-bold dark:text-gray-100 underline m-1"
                                style="color: #8a2036; font-size: 0.9rem;">Panel</a>
                        </li>
                        <li class="nav-item dropdown relative">
                            <a id="navbarDropdown" class="ml-3 text-sm font-bold text-gray-300 underline cursor-pointer"
                                style="color: #8a2036; font-size: 0.9rem;" onclick="toggleDropdown()">
                                {{ Auth::user()->name }}
                            </a>
                            <div id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-md shadow-lg"
                                style="background: #8a2036; border-radius: 0.5rem; padding: 0.5rem;">
                                <a class="dropdown-item text-sm font-bold block px-4 py-2 hover:bg-gray-700"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold underline">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-bold underline">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>

        <!-- Divider -->
        <div class="h-2 w-full rounded-lg mb-6" style="background-color: #55212e"></div>

        <!-- First Section -->
        <section class="bg-gray-300 shadow-md rounded-lg p-6 mt-6 custom-section">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <div class="carousel-container overflow-hidden relative">
                        <div class="carousel-images flex transition-transform duration-700">
                            <img src="/images/mapaches.jpg" alt="Mapache" class="w-full">
                            <img src="/images/liebre.jpg" alt="Liebre" class="w-full">
                            <img src="/images/Armadillo.png" alt="Armadillo" class="w-full">
                            <img src="/images/puma.jpg" alt="Puma" class="w-full">
                        </div>
                    </div>

                </div>
                <div class="md:w-1/2 md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-bold mb-4">Más de 60 especies observadas</h2>
                    <div class="flex space-x-4">
                        <a href="/vistas-especies/7" class="custom-button px-4 py-2 rounded-lg">Información</a>
                        <a href="/animales" class="custom-button px-4 py-2 rounded-lg">Ver todos</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Zoonotic Diseases Section -->
        <section class="mt-6">
            <h2 class="text-xl font-bold">Enfermedades Zoonóticas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <!-- Rabia -->
                <div class="bg-white shadow-md rounded-lg p-4 custom-section">
                    <img src="/images/raba.jpg" alt="Rabia" class="rounded-lg mb-4">
                    <h3 class="text-lg font-bold">Rabia</h3>
                    <p class="mt-2">Una enfermedad viral que afecta el sistema nervioso de los mamíferos.</p>
                </div>

                <!-- Leptospirosis -->
                <div class="bg-white shadow-md rounded-lg p-4 custom-section">
                    <img src="/images/leptospirosis.jpg" alt="Leptospirosis" class="rounded-lg mb-4">
                    <h3 class="text-lg font-bold">Leptospirosis</h3>
                    <p class="mt-2">Una infección bacteriana transmitida por animales, especialmente roedores.</p>
                </div>

                <!-- Toxoplasmosis -->
                <div class="bg-white shadow-md rounded-lg p-4 custom-section">
                    <img src="/images/toxoplasmos.jpg" alt="Toxoplasmosis" class="rounded-lg mb-4">
                    <h3 class="text-lg font-bold">Toxoplasmosis</h3>
                    <p class="mt-2">Infección causada por un parásito comúnmente encontrado en gatos.</p>
                </div>
            </div>
        </section>

        <!-- More Information Section -->
        <section class="text-white rounded-lg p-6 mt-6 flex justify-between items-center custom-section"
            style="background-color: #8a2036">
            <p>Cuídate de las enfermedades que hay en Valle de Bravo</p>
            <a href="/venfermedades" class="bg-gray-200 px-4 py-2 rounded-lg custom-button">Más información</a>
        </section>

        <!-- Institutions Section -->
        <section class="mt-6">
            <h2 class="text-xl font-bold">Instituciones Especializadas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <!-- CONAFOR -->
                <div
                    class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center custom-section">
                    <div class="text-center">
                        <h3 class="text-lg font-bold">CONAFOR</h3>
                        <p class="mt-2">Organización dedicada a la conservación de la fauna silvestre en México.</p>
                    </div>
                    <img src="/images/CONAFOR.png" alt="CONAFOR" class="h-21 w-21 my-4">
                    <a href="https://www.conafor.gob.mx" target="_blank"
                        class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
                </div>

                <!-- CONANP -->
                <div
                    class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center custom-section">
                    <div class="text-center">
                        <h3 class="text-lg font-bold">CONANP</h3>
                        <p class="mt-2">La Comisión Nacional de Áreas Naturales Protegidas.</p>
                    </div>
                    <img src="/images/images.jpeg" alt="CONANP" class="h-21 w-21 my-4">
                    <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
                </div>

                <!-- ONG -->
                <div
                    class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center custom-section">
                    <div class="text-center">
                        <h3 class="text-lg font-bold">ONG</h3>
                        <p class="mt-2">ONG internacional con programas para la preservación de especies en peligro.
                        </p>
                    </div>
                    <img src="/images/ong.jpg" alt="ONG" class="h-17 w-17 my-4">
                    <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="custom-footer mt-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Regions Section -->
            <div>
                <h3 class="font-bold">Regiones</h3>
                <ul class="mt-2 footer-links">
                    <li><a href="https://edomex.gob.mx" target="_blank" class="block mt-1">Estado de México</a></li>
                    <li><a href="https://vallebravo.gob.mx" target="_blank" class="block mt-1">Valle de Bravo</a>
                    </li>
                    <li><a href="https://www.gob.mx" target="_blank" class="block mt-1">Gobierno de México</a></li>
                </ul>
            </div>

            <!-- Footer Logo Section -->
            <div class="flex justify-center items-center">
                <img src="/images/logo.png" alt="Sari" style="width: 100px">
            </div>

            <!-- Social Media Section -->
            <div>
                <h3 class="font-bold">Síguenos</h3>
                <div class="footer-icons flex space-x-4 mt-2">
                    <a href="https://.com"><img src="/images/x.png" alt="X"></a>
                    <a href="https://facebook.com"><img src="/images/facebook.png" alt="Facebook"></a>
                    <a href="https://instagram.com"><img src="/images/instagram.png" alt="Instagram"></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
