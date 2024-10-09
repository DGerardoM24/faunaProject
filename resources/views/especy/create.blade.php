@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Especy
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Especy</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('especies.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('especy.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
