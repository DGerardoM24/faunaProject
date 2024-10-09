<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_ruta" class="form-label">{{ __('Id Ruta') }}</label>
            <input type="text" name="id_ruta" class="form-control @error('id_ruta') is-invalid @enderror" value="{{ old('id_ruta', $ruta?->id_ruta) }}" id="id_ruta" placeholder="Id Ruta">
            {!! $errors->first('id_ruta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_ruta" class="form-label">{{ __('Desc Ruta') }}</label>
            <input type="text" name="desc_ruta" class="form-control @error('desc_ruta') is-invalid @enderror" value="{{ old('desc_ruta', $ruta?->desc_ruta) }}" id="desc_ruta" placeholder="Desc Ruta">
            {!! $errors->first('desc_ruta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rango" class="form-label">{{ __('Rango') }}</label>
            <input type="text" name="rango" class="form-control @error('rango') is-invalid @enderror" value="{{ old('rango', $ruta?->rango) }}" id="rango" placeholder="Rango">
            {!! $errors->first('rango', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>