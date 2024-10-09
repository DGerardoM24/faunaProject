@extends('layouts.app')

@section('template_title')
    {{ $especy->name ?? __('Show') . " " . __('Especy') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Especy</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('especies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Especie:</strong>
                                    {{ $especy->id_especie }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Comun:</strong>
                                    {{ $especy->nombre_comun }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Cientifico:</strong>
                                    {{ $especy->nombre_cientifico }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $especy->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Habitad:</strong>
                                    {{ $especy->habitad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Dieta:</strong>
                                    {{ $especy->id_dieta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Familia:</strong>
                                    {{ $especy->id_familia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Orden:</strong>
                                    {{ $especy->id_orden }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Clase:</strong>
                                    {{ $especy->id_clase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Entorno:</strong>
                                    {{ $especy->id_entorno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Bandera:</strong>
                                    {{ $especy->id_bandera }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tamanio:</strong>
                                    {{ $especy->tamanio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Estado Conservacion:</strong>
                                    {{ $especy->id_estado_conservacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Grupo:</strong>
                                    {{ $especy->id_grupo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
