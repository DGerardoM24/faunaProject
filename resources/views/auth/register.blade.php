@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center text-2x2 font-bold" style="color: #f5393b;">Registro de Usuario</h1>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" style="color: #fff;">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group mt-4">
                    <label for="email" style="color: #fff;">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <label for="password" style="color: #fff;">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group mt-4">
                    <label for="password-confirm" style="color: #fff;">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
