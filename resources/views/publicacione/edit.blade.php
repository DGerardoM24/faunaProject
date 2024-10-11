@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Publicacione
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top:50px;">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Publicacione</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('publicaciones.update', $publicacione->id_publicacion) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('publicacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
