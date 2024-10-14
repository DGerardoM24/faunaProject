@extends('layouts.app')

@section('template_title')
    Asigna Enfermedades
@endsection

@section('content')
    <div class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Asigna Enfermedades') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('asigna-enfermedades.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th>Enfermedad</th> <!-- Cambiado -->
                                        <th>Especie</th> <!-- Cambiado -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaEnfermedades as $asignaEnfermedade)
                                        <tr>
                                            <td>{{ $asignaEnfermedade->id_asigna_enfermedad }}</td>
                                            <td>{{ $asignaEnfermedade->enfermedade->nombre_enfermedad ?? 'N/A' }}</td>
                                            <!-- Mostrar nombre -->
                                            <td>{{ $asignaEnfermedade->especy->nombre_comun ?? 'N/A' }}</td>
                                            <!-- Mostrar nombre -->
                                            <td>
                                                <form
                                                    action="{{ route('asigna-enfermedades.destroy', $asignaEnfermedade->id_asigna_enfermedad) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('asigna-enfermedades.show', $asignaEnfermedade->id_asigna_enfermedad) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('asigna-enfermedades.edit', $asignaEnfermedade->id_asigna_enfermedad) }}"><i
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
                {!! $asignaEnfermedades->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
