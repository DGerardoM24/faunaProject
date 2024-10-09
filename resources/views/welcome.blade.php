<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="container mx-auto px-4">

    <header class="flex justify-between items-center py-4">
        <div class="flex items-center">
            <!-- Logo -->
            <img src="/images/Logo.png" alt="Sari" style="width: 50px">
            <!-- Espacio entre el logo y los enlaces -->
            <div class="ml-6">
                <!-- Título o cualquier otro contenido que quieras agregar junto al logo -->
                <h1 class="text-xl font-bold">Fauna de Valle de Bravo</h1>
            </div>
        </div>

        <!-- Enlaces de navegación (login, register) -->
        @if (Route::has('login'))
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ url('/home') }}" class="ml-4 text-sm font-bold dark:text-gray-300 underline" style="color: #8a2036"">Panel de Inicio</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-bold dark:text-gray-100 underline" style="color: #8a2036">Iniciar Sesión</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm font-bold dark:text-gray-300 underline" style="color: #8a2036">Registrarse</a>
                @endif
            @endauth
        </div>
        @endif
    </header>

    <div class="h-2 w-full rounded-lg" style="background-color: #55212e"></div>


 </div>

    <section class="bg-gray-300 shadow-md rounded-lg p-6 mt-6">
        <div class="flex">
            <div class="w-1/2">
                <img src="/images/mapaches.jpg" alt="Squirrel" class="rounded-lg">
            </div>
            <div class="w-1/2 ml-4">
                <h2 class="text-2xl font-bold mb-4">Más de 30 especies observadas</h2>
                <div class="flex space-x-4">
                    <a href="#" class=" text-white px-4 py-2 rounded-lg" style="background-color: #8a2036">Información</a>
                    <a href="#" class=" text-white px-4 py-2 rounded-lg" style="background-color: #8a2036">Ver todos</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-6">
        <h2 class="text-xl font-bold">Enfermedades Zoonóticas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            <!-- Rabia -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="/images/raba.jpg" alt="Rabia" class="rounded-lg mb-4">
                <h3 class="text-lg font-bold">Rabia</h3>
                <p class="mt-2">Una enfermedad viral que afecta el sistema nervioso de los mamíferos.</p>
            </div>

            <!-- Leptospirosis -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="/images/leptospirosis.jpg" alt="Leptospirosis" class="rounded-lg mb-4">
                <h3 class="text-lg font-bold">Leptospirosis</h3>
                <p class="mt-2">Una infección bacteriana transmitida por animales, especialmente roedores.</p>
            </div>

            <!-- Toxoplasmosis -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <img src="/images/toxoplasmos.jpg" alt="Toxoplasmosis" class="rounded-lg mb-4">
                <h3 class="text-lg font-bold">Toxoplasmosis</h3>
                <p class="mt-2">Infección causada por un parásito comúnmente encontrado en gatos.</p>
            </div>
        </div>
    </section>

    <section class=" text-white rounded-lg p-6 mt-6 flex justify-between items-center" style="background-color: #8a2036">
        <p>Cuídate de las enfermedades que causa la fauna de Valle de Bravo</p>
        <a href="#" class="bg-gray-200 px-4 py-2 rounded-lg" style="background-color: #8a2036">Más información</a>
    </section>
    <section class="mt-6">
        <h2 class="text-xl font-bold">Instituciones Especializadas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            <!-- CONAFOR -->
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center">
                <div class="text-center">
                    <h3 class="text-lg font-bold">CONAFOR</h3>
                    <p class="mt-2">Organización dedicada a la conservación de la fauna silvestre en México.</p>
                </div>
                <img src="/images/CONAFOR.png" alt="CONAFOR" class="h-21 w-21 my-4">
                <a href="https://www.conafor.gob.mx" target="_blank" class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
            </div>

            <!-- CONANP -->
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center">
                <div class="text-center">
                    <h3 class="text-lg font-bold">CONANP</h3>
                    <p class="mt-2">La Comisión Nacional de Áreas Naturales Protegidas.</p>
                </div>
                <img src="/images/images.jpeg" alt="CONANP" class="h-21 w-21 my-4">
                <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
            </div>

            <!-- ONG -->
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between items-center">
                <div class="text-center">
                    <h3 class="text-lg font-bold">ONG</h3>
                    <p class="mt-2">ONG internacional con programas para la preservación de especies en peligro.</p>
                </div>
                <img src="/images/ong.jpg" alt="ONG" class="h-17 w-17 my-4">
                <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg mt-4">Visitar Sitio Web</a>
            </div>
        </div>
    </section>

</div>
<footer class="text-white p-4 mt-6" style="background-color: #55212e">
    <div class="container mx-auto grid grid-cols-3 gap-4">
        <!-- Sección de Regiones -->
        <div>
            <h3 class="font-bold">Regiones</h3>
            <ul class="mt-2">
                <li><a href="https://edomex.gob.mx" target="_blank" class="underline">Estado de México</a></li>
                <li><a href="https://vallledebravo.gob.mx" target="_blank" class="underline">Valle de Bravo</a></li>
            </ul>
        </div>

        <!-- Sección de Ayuda -->
        <div>
            <h3 class="font-bold">Ayuda</h3>
            <ul class="mt-2">
                <li class="flex items-center mt-2">
                    <!-- Icono de teléfono -->
                    <img src="/images/phone-icon.png" alt="Teléfono" class="h-5 w-5 mr-2">
                    <span>7224226578</span>
                </li>
                <li class="flex items-center mt-2">
                    <!-- Icono de correo -->
                    <img src="/images/email-icon.png" alt="Correo" class="h-5 w-5 mr-2">
                    <a href="mailto:ir162565@gmail.com" class="underline">ir162565@gmail.com</a>
                </li>
            </ul>
        </div>

        <!-- Sección de Contactos -->
        <div>
            <h3 class="font-bold">Contactos</h3>
            <ul class="mt-2">
                <li><a href="https://www.conafor.gob.mx" target="_blank" class="underline">CONAFOR</a></li>
                <li><a href="https://www.conanp.gob.mx" target="_blank" class="underline">CONANP</a></li>
                <li><a href="#" target="_blank" class="underline">ONG</a></li>
            </ul>
        </div>
    </div>
</footer>
</html>
