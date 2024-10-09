@extends('layouts.app')

@section('template_title')
    Especies
@endsection

@section('content')
    <div class="container-fluid">
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
                                        
									<th >Id Especie</th>
									<th >Nombre Comun</th>
									<th >Nombre Cientifico</th>
									<th >Descripcion</th>
									<th >Habitad</th>
									<th >Id Dieta</th>
									<th >Id Familia</th>
									<th >Id Orden</th>
									<th >Id Clase</th>
									<th >Id Entorno</th>
									<th >Id Bandera</th>
									<th >Tamanio</th>
									<th >Id Estado Conservacion</th>
									<th >Id Grupo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($especies as $especy)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $especy->id_especie }}</td>
										<td >{{ $especy->nombre_comun }}</td>
										<td >{{ $especy->nombre_cientifico }}</td>
										<td >{{ $especy->descripcion }}</td>
										<td >{{ $especy->habitad }}</td>
										<td >{{ $especy->id_dieta }}</td>
										<td >{{ $especy->id_familia }}</td>
										<td >{{ $especy->id_orden }}</td>
										<td >{{ $especy->id_clase }}</td>
										<td >{{ $especy->id_entorno }}</td>
										<td >{{ $especy->id_bandera }}</td>
										<td >{{ $especy->tamanio }}</td>
										<td >{{ $especy->id_estado_conservacion }}</td>
										<td >{{ $especy->id_grupo }}</td>

                                            <td>
                                                <form action="{{ route('especies.destroy', $especy->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('especies.show', $especy->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('especies.edit', $especy->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
