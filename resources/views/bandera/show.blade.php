@extends('layouts.app')

@section('template_title')
    {{ $bandera->name ?? __('Show') . " " . __('Bandera') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bandera</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('banderas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Bandera:</strong>
                                    {{ $bandera->id_bandera }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nom Bandera:</strong>
                                    {{ $bandera->nom_bandera }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Bandera:</strong>
                                    {{ $bandera->desc_bandera }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
