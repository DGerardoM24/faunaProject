@extends('layouts.app')

@section('template_title')
    Asigna Multimedia
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Asigna Multimedia') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('asigna-multimedia.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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
                                        <th>Imagen</th>
                                        <th>Nombre Especie</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaMultimedia as $item)
                                        <tr>
                                            <td>{{ $item->id_asigna_multimedia }}</td>

                                            <!-- Mostrar la imagen -->
                                            <td>
                                                @if ($item->multimedia)
                                                    <img src="{{ asset('storage/' . $item->multimedia->multimedia) }}"
                                                         alt="Imagen" width="100" class="img-thumbnail">
                                                @else
                                                    <p>No image available</p>
                                                @endif
                                            </td>

                                            <!-- Mostrar el nombre de la especie -->
                                            <td>{{ $item->especie->nombre_cientifico ?? 'Especie no asignada' }}</td>

                                            <td>
                                                <form action="{{ route('asigna-multimedia.destroy', $item->id_asigna_multimedia) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('asigna-multimedia.show', $item->id_asigna_multimedia) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asigna-multimedia.edit', $item->id_asigna_multimedia) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
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
                {!! $asignaMultimedia->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
