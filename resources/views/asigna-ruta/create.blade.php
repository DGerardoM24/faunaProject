@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asigna Ruta
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Asigna Ruta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('asigna-rutas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asigna-ruta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
