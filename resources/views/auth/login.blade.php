@extends('layouts.app')

@section('content')

            <!-- Cuadro negro transparente -->


                    <h1 class="text-center text-2x2 font-bold" style="color: #f5393b;">Inicio de Sesión</h1>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" style="color: #fff;">{{ __('Correo') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mt-4">
                            <label for="password" style="color: #fff;">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember" style="color: #fff;">{{ __('Recordarme') }}</label>
                        </div>

                        <!-- Submit Button and Forgot Password Link -->
                        <div class="form-group mt-4 d-flex justify-content-between">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #f5393b;">
                                    {{ __('Olvidaste tu Contraseña?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary">
                                {{ __('Iniciar Sesión') }}
                            </button>
                        </div>
                    </form>




</div>
@endsection
