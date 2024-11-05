@extends('layouts.napp')

@section('template_title')
    Todas las Enfermedades
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center">Todas las Enfermedades Registradas</h2>
        <div class="row">
            @foreach ($enfermedades as $enfermedad)
                <div class="col-md-12 mb-4">
                    <div class="card h-100 flex-row">
                        <!-- Imagen opcional al lado izquierdo -->
                        <!-- Cuerpo de la tarjeta al lado derecho -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $enfermedad->Enfermedades }}</h5>
                            <h6 class="card-subtitle mb-2">{{ $enfermedad->Tipo }}</h6>
                            <p class="card-text">
                                <strong>Descripción:</strong> {{ $enfermedad->Descripcion }}<br>
                                <strong>Transmisión:</strong> {{ $enfermedad->Transmicion }}<br>
                                <strong>Gravedad:</strong> {{ $enfermedad->Tipo }}<br>
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
            display: flex;
            flex-direction: row;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
            color: #ffffff;
            flex: 1; /* Para que el contenido se adapte */
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

        /* Estilo para la imagen de la tarjeta */
        .card-img-left {
            max-height: 200px;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        /* Adaptación para móviles */
        @media (max-width: 768px) {
            .col-md-12 {
                margin-bottom: 20px;
            }
            .card {
                flex-direction: column;
            }
            .card-img-left {
                border-radius: 10px 10px 0 0;
                width: 100%;
                max-height: 250px;
            }
        }
    </style>
@endsection
