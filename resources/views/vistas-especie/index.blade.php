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
        margin-top: 50px;
    }

    .card {
        background-color: #8a2035; /* Color de fondo principal */
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05); /* Efecto hover */
    }

    .card-body {
        color: #ffffff; /* Texto blanco para contraste */
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-subtitle {
        color:  #281419; /* Color para el texto secundario */
        font-style: italic;
    }

    .card-text {
        margin-top: 10px;
        line-height: 1.5;
    }

    .text-center {
        color: #56212f; /* Título principal del contenedor */
    }

    @media (max-width: 768px) {
        .col-md-4 {
            margin-bottom: 20px;
        }
    }

    </style>
@endsection


