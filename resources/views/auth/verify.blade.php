@extends('layouts.app')

@section('content')

    <!-- Estilos adicionales para fondo y cuadro negro transparente -->
    <style>
        /* Imagen de fondo */
        body {
            background-image: url('/images/liebre.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
        }

        /* Cuadro negro transparente */
        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 3.5rem;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }
    </style>

    <!-- Cuadro negro transparente -->
    <div class="form-container">
        <h1 class="text-center text-2xl font-bold" style="color: #f5393b;">Verifica Tu Correo Electrónico</h1>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                </div>
            @endif

            <p style="color: #fff;">
                {{ __('Antes de continuar, verifica tu correo electrónico para obtener un enlace de verificación.') }}
            </p>
            <p style="color: #fff;">
                {{ __('Si no recibiste el correo electrónico') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: #f5393b;">
                        {{ __('haz clic aquí para solicitar otro') }}
                    </button>.
                </form>
            </p>
        </div>
    </div>

@endsection
