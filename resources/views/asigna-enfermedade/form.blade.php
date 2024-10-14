<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_enfermedad" class="form-label">{{ __('Enfermedad') }}</label>
            <select name="id_enfermedad" class="form-control @error('id_enfermedad') is-invalid @enderror" id="id_enfermedad" required>
                <option value="">Seleccione una enfermedad</option>
                @foreach ($enfermedades as $enfermedad)
                    <option value="{{ $enfermedad->id_enfermedad }}" {{ (old('id_enfermedad', $asignaEnfermedade?->id_enfermedad) == $enfermedad->id_enfermedad) ? 'selected' : '' }}>
                        {{ $enfermedad->nombre_enfermedad }} <!-- Asegúrate de tener un campo 'nombre' en tu modelo Enfermedad -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_enfermedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Especie') }}</label>
            <select name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" id="id_especie" required>
                <option value="">Seleccione una especie</option>
                @foreach ($especies as $especie)
                    <option value="{{ $especie->id_especie }}" {{ (old('id_especie', $asignaEnfermedade?->id_especie) == $especie->id_especie) ? 'selected' : '' }}>
                        {{ $especie->nombre_comun }} <!-- Asegúrate de tener un campo 'nombre' en tu modelo Especie -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
