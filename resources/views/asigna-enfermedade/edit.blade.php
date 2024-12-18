@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Asigna Enfermedade
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Asigna Enfermedade</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('asigna-enfermedades.update', $asignaEnfermedade->id_asigna_enfermedad) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('asigna-enfermedade.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
