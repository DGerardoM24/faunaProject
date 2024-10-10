@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Bandera
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Bandera</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('banderas.update', $bandera->id_bandera) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bandera.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
