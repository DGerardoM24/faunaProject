<div class="row padding-1 p-1" style="margin-top: 50px;">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Id Especie') }}</label>
            <input type="text" name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" value="{{ old('id_especie', $especy?->id_especie) }}" id="id_especie" placeholder="Id Especie">
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_comun" class="form-label">{{ __('Nombre Comun') }}</label>
            <input type="text" name="nombre_comun" class="form-control @error('nombre_comun') is-invalid @enderror" value="{{ old('nombre_comun', $especy?->nombre_comun) }}" id="nombre_comun" placeholder="Nombre Comun">
            {!! $errors->first('nombre_comun', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_cientifico" class="form-label">{{ __('Nombre Cientifico') }}</label>
            <input type="text" name="nombre_cientifico" class="form-control @error('nombre_cientifico') is-invalid @enderror" value="{{ old('nombre_cientifico', $especy?->nombre_cientifico) }}" id="nombre_cientifico" placeholder="Nombre Cientifico">
            {!! $errors->first('nombre_cientifico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $especy?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="habitad" class="form-label">{{ __('Habitad') }}</label>
            <input type="text" name="habitad" class="form-control @error('habitad') is-invalid @enderror" value="{{ old('habitad', $especy?->habitad) }}" id="habitad" placeholder="Habitad">
            {!! $errors->first('habitad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_dieta" class="form-label">{{ __('Dieta') }}</label>
            <select name="id_dieta" id="id_dieta" class="form-control @error('id_dieta') is-invalid @enderror">
                <option value="">Seleccione la dieta</option>
                @foreach($dietas as $dieta)
                    <option value="{{ $dieta->id_dieta }}" {{ old('id_dieta', $especy?->id_dieta) == $dieta->id_dieta ? 'selected' : '' }}>
                        {{ $dieta->desc_dieta }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_dieta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_familia" class="form-label">{{ __('Familia') }}</label>
            <select name="id_familia" id="id_familia" class="form-control @error('id_familia') is-invalid @enderror">
                <option value="">Seleccione la familia</option>
                @foreach($familias as $familia)
                    <option value="{{ $familia->id_familia }}" {{ old('id_familia', $especy?->id_familia) == $familia->id_familia ? 'selected' : '' }}>
                        {{ $familia->desc_familia }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_familia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_orden" class="form-label">{{ __('Orden') }}</label>
            <select name="id_orden" id="id_orden" class="form-control @error('id_orden') is-invalid @enderror">
                <option value="">Seleccione el orden</option>
                @foreach($ordenes as $orden)
                    <option value="{{ $orden->id_orden }}" {{ old('id_orden', $especy?->id_orden) == $orden->id_orden ? 'selected' : '' }}>
                        {{ $orden->desc_orden }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_orden', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_clase" class="form-label">{{ __('Clase') }}</label>
            <select name="id_clase" id="id_clase" class="form-control @error('id_clase') is-invalid @enderror">
                <option value="">Seleccione la clase</option>
                @foreach($clases as $clase)
                    <option value="{{ $clase->id_clase }}" {{ old('id_clase', $especy?->id_clase) == $clase->id_clase ? 'selected' : '' }}>
                        {{ $clase->desc_clase }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_clase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_entorno" class="form-label">{{ __('Entorno') }}</label>
            <select name="id_entorno" id="id_entorno" class="form-control @error('id_entorno') is-invalid @enderror">
                <option value="">Seleccione el entorno</option>
                @foreach($entornos as $entorno)
                    <option value="{{ $entorno->id_entorno }}" {{ old('id_entorno', $especy?->id_entorno) == $entorno->id_entorno ? 'selected' : '' }}>
                        {{ $entorno->desc_entorno }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_entorno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_bandera" class="form-label">{{ __('Bandera') }}</label>
            <select name="id_bandera" id="id_bandera" class="form-control @error('id_bandera') is-invalid @enderror">
                <option value="">Seleccione la bandera</option>
                @foreach($banderas as $bandera)
                    <option value="{{ $bandera->id_bandera }}" {{ old('id_bandera', $especy?->id_bandera) == $bandera->id_bandera ? 'selected' : '' }}>
                        {{ $bandera->nom_bandera }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_bandera', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tamanio" class="form-label">{{ __('Tamanio') }}</label>
            <input type="text" name="tamanio" class="form-control @error('tamanio') is-invalid @enderror" value="{{ old('tamanio', $especy?->tamanio) }}" id="tamanio" placeholder="Tamanio">
            {!! $errors->first('tamanio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_estado_conservacion" class="form-label">{{ __('Estado de Conservación') }}</label>
            <select name="id_estado_conservacion" id="id_estado_conservacion" class="form-control @error('id_estado_conservacion') is-invalid @enderror">
                <option value="">Seleccione el estado de conservación</option>
                @foreach($estados_conservacions as $estado)
                    <option value="{{ $estado->id_estado_conservacion }}" {{ old('id_estado_conservacion', $especy?->id_estado_conservacion) == $estado->id_estado_conservacion ? 'selected' : '' }}>
                        {{ $estado->desc_estado }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_estado_conservacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_grupo" class="form-label">{{ __('Grupo') }}</label>
            <select name="id_grupo" id="id_grupo" class="form-control @error('id_grupo') is-invalid @enderror">
                <option value="">Seleccione el grupo</option>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id_grupo }}" {{ old('id_grupo', $especy?->id_grupo) == $grupo->id_grupo ? 'selected' : '' }}>
                        {{ $grupo->desc_grupo }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_grupo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
