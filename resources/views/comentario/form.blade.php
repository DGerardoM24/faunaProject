<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_comentario" class="form-label">{{ __('Id Comentario') }}</label>
            <input type="text" name="id_comentario" class="form-control @error('id_comentario') is-invalid @enderror" value="{{ old('id_comentario', $comentario?->id_comentario) }}" id="id_comentario" placeholder="Id Comentario">
            {!! $errors->first('id_comentario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_comentario" class="form-label">{{ __('Desc Comentario') }}</label>
            <input type="text" name="desc_comentario" class="form-control @error('desc_comentario') is-invalid @enderror" value="{{ old('desc_comentario', $comentario?->desc_comentario) }}" id="desc_comentario" placeholder="Desc Comentario">
            {!! $errors->first('desc_comentario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>