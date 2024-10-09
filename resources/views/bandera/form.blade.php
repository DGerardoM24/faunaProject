<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_bandera" class="form-label">{{ __('Id Bandera') }}</label>
            <input type="text" name="id_bandera" class="form-control @error('id_bandera') is-invalid @enderror" value="{{ old('id_bandera', $bandera?->id_bandera) }}" id="id_bandera" placeholder="Id Bandera">
            {!! $errors->first('id_bandera', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nom_bandera" class="form-label">{{ __('Nom Bandera') }}</label>
            <input type="text" name="nom_bandera" class="form-control @error('nom_bandera') is-invalid @enderror" value="{{ old('nom_bandera', $bandera?->nom_bandera) }}" id="nom_bandera" placeholder="Nom Bandera">
            {!! $errors->first('nom_bandera', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_bandera" class="form-label">{{ __('Desc Bandera') }}</label>
            <input type="text" name="desc_bandera" class="form-control @error('desc_bandera') is-invalid @enderror" value="{{ old('desc_bandera', $bandera?->desc_bandera) }}" id="desc_bandera" placeholder="Desc Bandera">
            {!! $errors->first('desc_bandera', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>