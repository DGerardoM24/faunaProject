<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_asigna_enfermedad" class="form-label">{{ __('Id Asigna Enfermedad') }}</label>
            <input type="text" name="id_asigna_enfermedad" class="form-control @error('id_asigna_enfermedad') is-invalid @enderror" value="{{ old('id_asigna_enfermedad', $asignaEnfermedade?->id_asigna_enfermedad) }}" id="id_asigna_enfermedad" placeholder="Id Asigna Enfermedad">
            {!! $errors->first('id_asigna_enfermedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_enfermedad" class="form-label">{{ __('Id Enfermedad') }}</label>
            <input type="text" name="id_enfermedad" class="form-control @error('id_enfermedad') is-invalid @enderror" value="{{ old('id_enfermedad', $asignaEnfermedade?->id_enfermedad) }}" id="id_enfermedad" placeholder="Id Enfermedad">
            {!! $errors->first('id_enfermedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Id Especie') }}</label>
            <input type="text" name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" value="{{ old('id_especie', $asignaEnfermedade?->id_especie) }}" id="id_especie" placeholder="Id Especie">
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>