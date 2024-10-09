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
        <h1 class="text-center text-2xl font-bold" style="color: #f5393b;">Restablecer Contraseña</h1>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" style="color: #fff;">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <label for="password" style="color: #fff;">{{ __('Nueva Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group mt-4">
                    <label for="password-confirm" style="color: #fff;">{{ __('Confirmar Nueva Contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Restablecer Contraseña') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
