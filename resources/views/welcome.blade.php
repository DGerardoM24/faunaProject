<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fauna de Valle de Bravo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<div class="container mx-auto px-4">
    <header class="flex justify-between items-center py-4">
        <img src="/images/Logo..png" alt="Logo" class="h-12">
    </header>

{{--    <div class="relative flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">--}}
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
{{--    </div>--}}

    <section class="bg-white shadow-md rounded-lg p-6 mt-6">
        <div class="flex">
            <div class="w-1/2">
                <img src="/images/principal.jpg" alt="Squirrel" class="rounded-lg">
            </div>
            <div class="w-1/2 ml-4">
                <h2 class="text-2xl font-bold mb-4">Más de 30 especies observadas</h2>
                <div class="flex space-x-4">
                    <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg">Información</a>
                    <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg">Ver todos</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-red-700 text-white rounded-lg p-6 mt-6 flex justify-between items-center">
        <p>Cuídate de las enfermedades que causa la fauna de Valle de Bravo</p>
        <a href="#" class="bg-gray-200 text-red-700 px-4 py-2 rounded-lg">Más información</a>
    </section>

    <section class="mt-6">
        <h2 class="text-xl font-bold">Instituciones para el cuidado de la vida silvestre</h2>
        <!-- Contenido adicional aquí -->
    </section>
</div>

<footer class="bg-red-700 text-white p-4 mt-6">
    <div class="container mx-auto grid grid-cols-3 gap-4">
        <div>
            <h3 class="font-bold">Regiones</h3>
            <!-- Contenido de regiones -->
        </div>
        <div>
            <h3 class="font-bold">Ayuda</h3>
            <!-- Contenido de ayuda -->
        </div>
        <div>
            <h3 class="font-bold">Contactos</h3>
            <!-- Contenido de contactos -->
        </div>
    </div>
</footer>
</body>
</html>
