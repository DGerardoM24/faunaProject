@extends('layouts.app')

@section('template_title')
    {{ $asignaEnfermedade->name ?? __('Show') . " " . __('Asigna Enfermedade') }}
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asigna Enfermedade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('asigna-enfermedades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Id Asigna Enfermedad:</strong>
                                    {{ $asignaEnfermedade->id_asigna_enfermedad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Enfermedad:</strong>
                                    {{ $asignaEnfermedade->id_enfermedad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Especie:</strong>
                                    {{ $asignaEnfermedade->id_especie }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
