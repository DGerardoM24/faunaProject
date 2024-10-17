@extends('layouts.napp')

@section('template_title')
    {{ $especie->Nombre_Comun }}
@endsection

@section('content')
    <div class="container">
        <!-- Título de la especie arriba de todo -->
        <div class="text-center">
            <h2 class="species-title">{{ $especie->Nombre_Comun }}</h2>
            <h4 class="species-subtitle"><i>{{ $especie->Nombre_Cientifico }}</i></h4>
        </div>

        <div class="row mt-4">
            <!-- Sección de la imagen -->
            <div class="col-md-6 mb-4">
                <div class="image-container shadow-lg p-3 mb-2 rounded" style="background: #55212e">
                    @if ($especie->Multimedia)
                        <img src="{{ asset('storage/' . $especie->Multimedia) }}" class="img-fluid rounded"
                            alt="Imagen de {{ $especie->Nombre_Comun }}">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid rounded" alt="No image available">
                    @endif
                </div>

                <!-- Cuadro de descripción debajo de la imagen -->
                <div class="description-box p-4 shadow-lg rounded">
                    <h4 class="description-title">Descripción</h4>
                    <p style="color: #fff">{{ $especie->Descripcion }}</p>
                </div>
            </div>

            <!-- Sección de la información -->
            <div class="col-md-6">
                <div class="info-box p-4 shadow-lg rounded">
                    <ul class="info-list mt-4">
                        <li><strong>Hábitad:</strong> {{ $especie->Habitad }}</li>
                        <li><strong>Tamaño:</strong> {{ $especie->Tamanio }}</li>
                        <li><strong>Familia:</strong> {{ $especie->Familia }}</li>
                        <li><strong>Dieta:</strong> {{ $especie->Dieta }}</li>
                        <li><strong>Estado de Conservación:</strong> {{ $especie->Estado_Conservacion }}</li>
                        <li><strong>Entorno:</strong> {{ $especie->Entorno }}</li>
                        <li><strong>Bandera:</strong> {{ $especie->Bandera }}</li>
                        <li><strong>Grupo:</strong> {{ $especie->Grupo }}</li>
                        <li><strong>Enfermedades:</strong>
                            @if ($especie->Enfermedades)
                                <ul>
                                    @foreach (explode(', ', $especie->Enfermedades) as $enfermedad)
                                        <li>{{ $enfermedad }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No se han reportado enfermedades.
                            @endif
                        </li>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS personalizado -->
    <style>
        .container {
            margin-top: 0px;
        }

        .species-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #b91c1c;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .species-subtitle {
            font-size: 1.7rem;
            color: #8a2036;
            font-style: italic;
        }

        .img-fluid {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .image-container {
            background-color: #fff;
            padding: 10px;
            border-radius: 15px;
            transition: all 0.3s ease-in-out;
        }

        .image-container:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        /* Cuadro de descripción */
        .description-box {
            background-color: #b91c1c;
            border: 4px solid #55212e;
            border-radius: 10px;
            color: #55212e;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .description-title {
            font-size: 1.6rem;
            font-weight: bold;
            color: #ffffff;
        }

        .info-box {
            background-color: #f5f5f5;
            border: 1px solid #b91c1c;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .info-list {
            list-style-type: none;
            padding-left: 0;
        }

        .info-list li {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #55212e;
        }

        strong {
            color: #b91c1c;
        }

        .row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        /* Efecto hover sobre la imagen */
        .img-fluid:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
@endsection
