@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asigna Multimedia
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Asigna Multimedia</span>
                    </div>
                    <div class="card-body bg-white">
                        <form action="{{ route('asigna-multimedia.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('asigna-multimedia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
