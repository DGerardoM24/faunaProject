@extends('layouts.app')

@section('template_title')
    {{ $asignaComentario->name ?? __('Show') . " " . __('Asigna Comentario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asigna Comentario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asigna-comentarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Asigna Comentario:</strong>
                                    {{ $asignaComentario->id_asigna_comentario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Comentario:</strong>
                                    {{ $asignaComentario->id_comentario }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Publicacion:</strong>
                                    {{ $asignaComentario->id_publicacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
