<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_clase" class="form-label">{{ __('Id Clase') }}</label>
            <input type="text" name="id_clase" class="form-control @error('id_clase') is-invalid @enderror" value="{{ old('id_clase', $clase?->id_clase) }}" id="id_clase" placeholder="Id Clase">
            {!! $errors->first('id_clase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_clase" class="form-label">{{ __('Desc Clase') }}</label>
            <input type="text" name="desc_clase" class="form-control @error('desc_clase') is-invalid @enderror" value="{{ old('desc_clase', $clase?->desc_clase) }}" id="desc_clase" placeholder="Desc Clase">
            {!! $errors->first('desc_clase', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>