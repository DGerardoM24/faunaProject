@extends('layouts.app')

@section('content')

    <div class="container">
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
