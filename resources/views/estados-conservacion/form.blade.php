<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_estado_conservacion" class="form-label">{{ __('Id Estado Conservacion') }}</label>
            <input type="text" name="id_estado_conservacion" class="form-control @error('id_estado_conservacion') is-invalid @enderror" value="{{ old('id_estado_conservacion', $estadosConservacion?->id_estado_conservacion) }}" id="id_estado_conservacion" placeholder="Id Estado Conservacion">
            {!! $errors->first('id_estado_conservacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_estado" class="form-label">{{ __('Desc Estado') }}</label>
            <input type="text" name="desc_estado" class="form-control @error('desc_estado') is-invalid @enderror" value="{{ old('desc_estado', $estadosConservacion?->desc_estado) }}" id="desc_estado" placeholder="Desc Estado">
            {!! $errors->first('desc_estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>