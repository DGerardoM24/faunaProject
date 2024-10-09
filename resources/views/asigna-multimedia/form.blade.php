<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_asigna_multimedia" class="form-label">{{ __('Id Asigna Multimedia') }}</label>
            <input type="text" name="id_asigna_multimedia" class="form-control @error('id_asigna_multimedia') is-invalid @enderror" value="{{ old('id_asigna_multimedia', $asignaMultimedia?->id_asigna_multimedia) }}" id="id_asigna_multimedia" placeholder="Id Asigna Multimedia">
            {!! $errors->first('id_asigna_multimedia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_imagen" class="form-label">{{ __('Id Imagen') }}</label>
            <input type="text" name="id_imagen" class="form-control @error('id_imagen') is-invalid @enderror" value="{{ old('id_imagen', $asignaMultimedia?->id_imagen) }}" id="id_imagen" placeholder="Id Imagen">
            {!! $errors->first('id_imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Id Especie') }}</label>
            <input type="text" name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" value="{{ old('id_especie', $asignaMultimedia?->id_especie) }}" id="id_especie" placeholder="Id Especie">
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>