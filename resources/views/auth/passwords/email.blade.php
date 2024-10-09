@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center text-2xl font-bold" style="color: #f5393b;">Restablecer Contraseña</h1>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" style="color: #fff;">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enviar Enlace de Restablecimiento de Contraseña') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
