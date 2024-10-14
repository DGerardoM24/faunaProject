@extends('layouts.app')

@section('template_title')
    Clases
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <!-- Sidebar -->

            <!-- Main content -->
            <div class=""> <!-- Ajusta la columna principal -->
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Clases') }}</span>
                            <div class="float-right">
                                <a href="{{ route('clases.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Desc Clase</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clases as $clase)
                                        <tr>
                                            <td>{{ $clase->id_clase }}</td>
                                            <td>{{ $clase->desc_clase }}</td>
                                            <td>
                                                <form action="{{ route('clases.destroy', $clase->id_clase) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('clases.show', $clase->id_clase) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clases.edit', $clase->id_clase) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clases->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
