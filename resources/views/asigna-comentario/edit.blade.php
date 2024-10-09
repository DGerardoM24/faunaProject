@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Asigna Comentario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Asigna Comentario</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('asigna-comentarios.update', $asignaComentario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('asigna-comentario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
