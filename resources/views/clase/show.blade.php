@extends('layouts.app')

@section('template_title')
    {{ $clase->name ?? __('Show') . " " . __('Clase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Clase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Clase:</strong>
                                    {{ $clase->id_clase }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Clase:</strong>
                                    {{ $clase->desc_clase }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
