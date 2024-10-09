<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_familia" class="form-label">{{ __('Id Familia') }}</label>
            <input type="text" name="id_familia" class="form-control @error('id_familia') is-invalid @enderror" value="{{ old('id_familia', $familia?->id_familia) }}" id="id_familia" placeholder="Id Familia">
            {!! $errors->first('id_familia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_familia" class="form-label">{{ __('Desc Familia') }}</label>
            <input type="text" name="desc_familia" class="form-control @error('desc_familia') is-invalid @enderror" value="{{ old('desc_familia', $familia?->desc_familia) }}" id="desc_familia" placeholder="Desc Familia">
            {!! $errors->first('desc_familia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>