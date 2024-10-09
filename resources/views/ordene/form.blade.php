<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_orden" class="form-label">{{ __('Id Orden') }}</label>
            <input type="text" name="id_orden" class="form-control @error('id_orden') is-invalid @enderror" value="{{ old('id_orden', $ordene?->id_orden) }}" id="id_orden" placeholder="Id Orden">
            {!! $errors->first('id_orden', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_orden" class="form-label">{{ __('Desc Orden') }}</label>
            <input type="text" name="desc_orden" class="form-control @error('desc_orden') is-invalid @enderror" value="{{ old('desc_orden', $ordene?->desc_orden) }}" id="desc_orden" placeholder="Desc Orden">
            {!! $errors->first('desc_orden', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>