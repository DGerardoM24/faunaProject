@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Especy
@endsection

@section('content')
    <section class="content container-fluid" style="margin-top: 50px;">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Especy</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('especies.update', $especy->id_especie) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('especy.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
