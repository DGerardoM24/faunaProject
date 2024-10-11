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
                                <a href="{{ route('especies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Nombre Común</th>
										<th>Nombre Científico</th>
										<th>Descripción</th>
										<th>Hábitat</th>
										<th>Dieta</th>
										<th>Familia</th>
										<th>Orden</th>
										<th>Clase</th>
										<th>Entorno</th>
										<th>Bandera</th>
										<th>Tamaño</th>
										<th>Estado de Conservación</th>
										<th>Grupo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($especies as $especy)
                                        <tr>
											<td>{{ $especy->id_especie }}</td>
											<td>{{ $especy->nombre_comun }}</td>
											<td>{{ $especy->nombre_cientifico }}</td>
											<td>{{ $especy->descripcion }}</td>
											<td>{{ $especy->habitat }}</td>
											<td>{{ $especy->dieta->desc_dieta?? 'Sin Dieta' }}</td>
											<td>{{ $especy->familia->desc_familia ?? 'Sin Familia' }}</td>
											<td>{{ $especy->ordene->desc_orden ?? 'Sin Orden' }}</td>
											<td>{{ $especy->clase->desc_clase ?? 'Sin Clase' }}</td>
											<td>{{ $especy->entorno->desc_entorno ?? 'Sin Entorno' }}</td>
											<td>{{ $especy->bandera->nom_bandera ?? 'Sin Bandera' }}</td>
											<td>{{ $especy->tamanio }}</td>
											<td>{{ $especy->estadosConservacion->desc_estado ?? 'Sin Estado' }}</td>
											<td>{{ $especy->grupo->desc_grupo ?? 'Sin Grupo' }}</td>

                                            <td>
                                                <form action="{{ route('especies.destroy', $especy->id_especie) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('especies.show', $especy->id_especie) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('especies.edit', $especy->id_especie) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar esta especie?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $especies->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
