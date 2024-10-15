@extends('layouts.napp')

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
    <div class="form-container" style="margin-top: 50px">
        <h1 class="text-center text-2xl font-bold" style="color: #f5393b;">Confirmar Contraseña</h1>

        <div class="card-body">
            <p class="text-center" style="color: #fff;">{{ __('Por favor, confirma tu contraseña antes de continuar.') }}</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" style="color: #fff;">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirmar Contraseña') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
