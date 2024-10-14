<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="id_ruta" class="form-label">{{ __('Ruta') }}</label>
            <select name="id_ruta" class="form-control @error('id_ruta') is-invalid @enderror" id="id_ruta">
                <option value="">{{ __('Select Ruta') }}</option>
                @foreach($rutas as $ruta)
                    <option value="{{ $ruta->id_ruta }}" {{ old('id_ruta', $asignaRuta->id_ruta ?? '') == $ruta->id_ruta ? 'selected' : '' }}>
                        {{ $ruta->desc_ruta}}  <!-- Asume que tienes un campo 'nombre_ruta' -->
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_ruta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Especie') }}</label>
            <select name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" id="id_especie">
                <option value="">{{ __('Select Especie') }}</option>
                @foreach($especies as $especie)
                    <option value="{{ $especie->id_especie }}" {{ old('id_especie', $asignaRuta->id_especie ?? '') == $especie->id_especie ? 'selected' : '' }}>
                        {{ $especie->nombre_comun }}  <!-- Asume que tienes un campo 'nombre_especie' -->
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
