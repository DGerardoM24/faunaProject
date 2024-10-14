@extends('layouts.app')

@section('template_title')
    Multimedia
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-sm" style="border: 1px solid #55212e; border-radius: 8px;">
                    <div class="card-header" style="background-color: #8a2036; color: white; font-weight: bold; text-align: center; font-size: 1.5em;">
                        {{ __('Multimedia') }}
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
                            <div>
                                <a href="{{ route('multimedia.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead" style="background-color: #f2f2f2;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Multimedia</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multimedia as $item)
                                        <tr>
                                            <td>{{ $item->id_multimedia }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>
                                                @if($item->multimedia)
                                                    <img src="{{ asset('storage/' . $item->multimedia) }}" alt="{{ $item->multimedia }}" width="200" class="img-thumbnail">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('multimedia.destroy', $item->id_multimedia) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('multimedia.show', $item->id_multimedia) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('multimedia.edit', $item->id_multimedia) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $multimedia->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

<style>
    /* Estilos para la tarjeta de multimedia */
    .card {
        border-radius: 8px; /* Esquinas redondeadas */
        overflow: hidden; /* Evita que el contenido sobresalga */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
    }

    /* Estilo para el encabezado */
    .card-header {
        background-color: #8a2036;
        color: white;
        font-weight: bold;
        text-align: center;
        font-size: 1.5em;
    }

    /* Mejora los enlaces de la tabla */
    .table a {
        color: #55212e; /* Color de los enlaces */
        text-decoration: none; /* Sin subrayado */
    }

    /* Efecto hover en los enlaces de la tabla */
    .table a:hover {
        text-decoration: underline; /* Subrayado al pasar el mouse */
    }
</style>
