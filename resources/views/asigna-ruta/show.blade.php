@extends('layouts.app')

@section('template_title')
    {{ $asignaRuta->name ?? __('Show') . " " . __('Asigna Ruta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asigna Ruta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asigna-rutas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Asigna Rutas:</strong>
                                    {{ $asignaRuta->id_asigna_rutas }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Ruta:</strong>
                                    {{ $asignaRuta->id_ruta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Especie:</strong>
                                    {{ $asignaRuta->id_especie }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
