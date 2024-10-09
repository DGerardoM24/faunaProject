@extends('layouts.app')

@section('template_title')
    {{ $multimedia->name ?? __('Show') . " " . __('Multimedia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Multimedia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('multimedia.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Multimedia:</strong>
                                    {{ $multimedia->id_multimedia }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $multimedia->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Multimedia:</strong>
                                    {{ $multimedia->multimedia }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
