<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_tipo" class="form-label">{{ __('Id Tipo') }}</label>
            <input type="text" name="id_tipo" class="form-control @error('id_tipo') is-invalid @enderror" value="{{ old('id_tipo', $tipoEnfermedade?->id_tipo) }}" id="id_tipo" placeholder="Id Tipo">
            {!! $errors->first('id_tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_tipo" class="form-label">{{ __('Desc Tipo') }}</label>
            <input type="text" name="desc_tipo" class="form-control @error('desc_tipo') is-invalid @enderror" value="{{ old('desc_tipo', $tipoEnfermedade?->desc_tipo) }}" id="desc_tipo" placeholder="Desc Tipo">
            {!! $errors->first('desc_tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>