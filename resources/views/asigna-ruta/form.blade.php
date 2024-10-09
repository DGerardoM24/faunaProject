<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_asigna_rutas" class="form-label">{{ __('Id Asigna Rutas') }}</label>
            <input type="text" name="id_asigna_rutas" class="form-control @error('id_asigna_rutas') is-invalid @enderror" value="{{ old('id_asigna_rutas', $asignaRuta?->id_asigna_rutas) }}" id="id_asigna_rutas" placeholder="Id Asigna Rutas">
            {!! $errors->first('id_asigna_rutas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_ruta" class="form-label">{{ __('Id Ruta') }}</label>
            <input type="text" name="id_ruta" class="form-control @error('id_ruta') is-invalid @enderror" value="{{ old('id_ruta', $asignaRuta?->id_ruta) }}" id="id_ruta" placeholder="Id Ruta">
            {!! $errors->first('id_ruta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Id Especie') }}</label>
            <input type="text" name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" value="{{ old('id_especie', $asignaRuta?->id_especie) }}" id="id_especie" placeholder="Id Especie">
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>