@extends('layouts.app')

@section('template_title')
    {{ $especy->nombre_comun ?? __('Mostrar Especie') }}
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar Especie') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('especies.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Id Especie:</strong>
                            {{ $especy->id_especie }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre Común:</strong>
                            {{ $especy->nombre_comun }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre Científico:</strong>
                            {{ $especy->nombre_cientifico }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripción:</strong>
                            {{ $especy->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Hábitat:</strong>
                            {{ $especy->habitad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dieta:</strong>
                            {{ $especy->dieta->desc_dieta ?? 'Sin Dieta' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Familia:</strong>
                            {{ $especy->familia->desc_familia ?? 'Sin Familia' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Orden:</strong>
                            {{ $especy->ordene->desc_orden ?? 'Sin Orden' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Clase:</strong>
                            {{ $especy->clase->desc_clase ?? 'Sin Clase' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Entorno:</strong>
                            {{ $especy->entorno->desc_entorno ?? 'Sin Entorno' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Bandera:</strong>
                            {{ $especy->bandera->nom_bandera ?? 'Sin Bandera' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tamaño:</strong>
                            {{ $especy->tamanio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Estado de Conservación:</strong>
                            {{ $especy->estadosConservacion->desc_estado ?? 'Sin Estado' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Grupo:</strong>
                            {{ $especy->grupo->desc_grupo ?? 'Sin Grupo' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
