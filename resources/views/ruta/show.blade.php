@extends('layouts.app')

@section('template_title')
    {{ $ruta->name ?? __('Show') . " " . __('Ruta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ruta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('rutas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Ruta:</strong>
                                    {{ $ruta->id_ruta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Ruta:</strong>
                                    {{ $ruta->desc_ruta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rango:</strong>
                                    {{ $ruta->rango }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection