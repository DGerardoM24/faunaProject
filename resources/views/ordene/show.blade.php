@extends('layouts.app')

@section('template_title')
    {{ $ordene->name ?? __('Show') . " " . __('Ordene') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ordene</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ordenes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Orden:</strong>
                                    {{ $ordene->id_orden }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Desc Orden:</strong>
                                    {{ $ordene->desc_orden }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
