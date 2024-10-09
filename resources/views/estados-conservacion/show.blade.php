@extends('layouts.app')

@section('template_title')
    {{ $estadosConservacion->name ?? __('Show') . " " . __('Estados Conservacion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estados Conservacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estados-conservacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Estado Conservacion:</strong>
                                    {{ $estadosConservacion->id_estado_conservacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Estado:</strong>
                                    {{ $estadosConservacion->desc_estado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
