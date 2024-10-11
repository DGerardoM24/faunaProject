@extends('layouts.app')

@section('template_title')
    Publicaciones
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Publicaciones') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('publicaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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


									<th >Titulo</th>
									<th >Id Especie</th>
									<th >Fecha P</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publicaciones as $publicacione)
                                        <tr>

										<td >{{ $publicacione->id_publicacion }}</td>
										<td >{{ $publicacione->titulo }}</td>
										<td >{{ $publicacione->id_especie }}</td>
										<td >{{ $publicacione->fecha_p }}</td>

                                            <td>
                                                <form action="{{ route('publicaciones.destroy', $publicacione->id_publicacion) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('publicaciones.show', $publicacione->id_publicacion) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('publicaciones.edit', $publicacione->id_publicacion) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $publicaciones->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
