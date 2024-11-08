@extends('layouts.napp')

@section('template_title')
    Resultados de la Búsqueda
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Resultados de la búsqueda para: "{{ str_replace('%', '', $termino) }}"</h2>


        @if($resultados->isEmpty())
            <p>No se encontraron especies que coincidan con el término.</p>
        @else
            <div class="row">
                @foreach ($resultados as $especie)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('vistas-especie.show', $especie->id_especie) }}" class="stretched-link">
                                @if ($especie->multimedia)
                                    <img src="{{ asset('storage/' . $especie->multimedia) }}" class="card-img-top img-thumbnail"
                                        alt="Imagen de {{ $especie->nombre_comun }}"
                                        style="max-height: 250px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" class="card-img-top img-thumbnail"
                                        alt="No image available"
                                        style="max-height: 250px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                @endif
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $especie->nombre_comun }}</h5>
                                <h6 class="card-subtitle mb-2">{{ $especie->nombre_cientifico }}</h6>
                                <p class="card-text">
                                    <strong>Dieta:</strong> {{ $especie->dieta }}<br>
                                    <strong>Estado de Conservación:</strong> {{ $especie->estado_conservacion }}<br>
                                    <strong>Bandera:</strong> {{ $especie->bandera }}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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