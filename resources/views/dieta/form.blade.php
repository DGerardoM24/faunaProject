<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_dieta" class="form-label">{{ __('Id Dieta') }}</label>
            <input type="text" name="id_dieta" class="form-control @error('id_dieta') is-invalid @enderror" value="{{ old('id_dieta', $dieta?->id_dieta) }}" id="id_dieta" placeholder="Id Dieta">
            {!! $errors->first('id_dieta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_dieta" class="form-label">{{ __('Desc Dieta') }}</label>
            <input type="text" name="desc_dieta" class="form-control @error('desc_dieta') is-invalid @enderror" value="{{ old('desc_dieta', $dieta?->desc_dieta) }}" id="desc_dieta" placeholder="Desc Dieta">
            {!! $errors->first('desc_dieta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>