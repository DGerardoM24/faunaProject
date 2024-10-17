@extends('layouts.napp')

@section('template_title')
    Todas las Especies
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Todas las Especies</h2>
        <div class="row">
            @foreach ($especies as $especie)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <!-- Hacer que toda la tarjeta sea clicable -->
                        <a href="{{ route('vistas-especie.show', $especie->id_especie) }}" class="stretched-link">
                            @if ($especie->Multimedia)
                                <img src="{{ asset('storage/' . $especie->Multimedia) }}" class="card-img-top img-thumbnail"
                                    alt="Imagen de {{ $especie->Nombre_Comun }}"
                                    style="max-height: 250px; object-fit: cover; border-radius: 10px 10px 0 0;">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-thumbnail"
                                    alt="No image available"
                                    style="max-height: 250px; object-fit: cover; border-radius: 10px 10px 0 0;">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $especie->Nombre_Comun }}</h5>
                            <h6 class="card-subtitle mb-2">{{ $especie->Nombre_Cientifico }}</h6>
                            <p class="card-text">
                                <strong>Dieta:</strong> {{ $especie->Dieta }}<br>
                                <strong>Estado de Conservación:</strong> {{ $especie->Estado_Conservacion }}<br>
                                <strong>Bandera:</strong> {{ $especie->Bandera }}<br>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Estilos personalizados */
        .container {

        }

        .card {
            background-color: #8a2035;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
            color: #ffffff;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: capitalize;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #f7c6d4;
            /* Color secundario para resaltar subtítulo */
            font-style: italic;
            margin-bottom: 10px;
        }

        .card-text {
            margin-top: 15px;
            line-height: 1.7;
        }

        .text-center {
            color: #56212f;
            margin-bottom: 40px;
            font-size: 2rem;
            font-weight: bold;
        }

        /* Adaptación para móviles */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 20px;
            }
        }

        /* Estilo para la imagen de la tarjeta */
        .card-img-top {
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
