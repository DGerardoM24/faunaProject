@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center text-2xl font-bold" style="color: #f5393b;">Confirmar Contraseña</h1>

        <div class="card-body">
            <p class="text-center">{{ __('Por favor, confirma tu contraseña antes de continuar.') }}</p>

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
