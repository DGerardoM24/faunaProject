@extends('layouts.app')

@section('template_title')
    {{ $tipoEnfermedade->name ?? __('Show') . " " . __('Tipo Enfermedade') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Enfermedade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo-enfermedades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo:</strong>
                                    {{ $tipoEnfermedade->id_tipo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Tipo:</strong>
                                    {{ $tipoEnfermedade->desc_tipo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
