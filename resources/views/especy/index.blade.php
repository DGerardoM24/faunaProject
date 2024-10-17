@extends('layouts.app')

@section('template_title')
    Especies
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Especies') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('especies.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Nuevo') }}
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
                            @foreach ($especies as $especy)
                                <div class="especie-item p-3 mb-3 border">
                                    <div><strong>No:</strong> {{ $especy->id_especie }}</div>
                                    <div><strong>Nombre Común:</strong> {{ $especy->nombre_comun }}</div>
                                    <div><strong>Nombre Científico:</strong> {{ $especy->nombre_cientifico }}</div>
                                    <div><strong>Descripción:</strong> {{ $especy->descripcion }}</div>
                                    <div><strong>Hábitad:</strong> {{ $especy->habitad }}</div>
                                    <div><strong>Dieta:</strong> {{ $especy->dieta->desc_dieta ?? 'Sin Dieta' }}</div>
                                    <div><strong>Familia:</strong> {{ $especy->familia->desc_familia ?? 'Sin Familia' }}</div>
                                    <div><strong>Orden:</strong> {{ $especy->ordene->desc_orden ?? 'Sin Orden' }}</div>
                                    <div><strong>Clase:</strong> {{ $especy->clase->desc_clase ?? 'Sin Clase' }}</div>
                                    <div><strong>Entorno:</strong> {{ $especy->entorno->desc_entorno ?? 'Sin Entorno' }}</div>
                                    <div><strong>Bandera:</strong> {{ $especy->bandera->nom_bandera ?? 'Sin Bandera' }}</div>
                                    <div><strong>Tamaño:</strong> {{ $especy->tamanio }} cm</div>
                                    <div><strong>Estado de Conservación:</strong> {{ $especy->estadosConservacion->desc_estado ?? 'Sin Estado' }}</div>
                                    <div><strong>Grupo:</strong> {{ $especy->grupo->desc_grupo ?? 'Sin Grupo' }}</div>

                                    <div class="mt-3">
                                        <form action="{{ route('especies.destroy', $especy->id_especie) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('especies.show', $especy->id_especie) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                            </a>
                                            <a class="btn btn-sm btn-success" href="{{ route('especies.edit', $especy->id_especie) }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar esta especie?') ? this.closest('form').submit() : false;">
                                                <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {!! $especies->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
