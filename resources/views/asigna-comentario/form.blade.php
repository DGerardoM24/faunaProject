<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_asigna_comentario" class="form-label">{{ __('Id Asigna Comentario') }}</label>
            <input type="text" name="id_asigna_comentario" class="form-control @error('id_asigna_comentario') is-invalid @enderror" value="{{ old('id_asigna_comentario', $asignaComentario?->id_asigna_comentario) }}" id="id_asigna_comentario" placeholder="Id Asigna Comentario">
            {!! $errors->first('id_asigna_comentario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_comentario" class="form-label">{{ __('Id Comentario') }}</label>
            <input type="text" name="id_comentario" class="form-control @error('id_comentario') is-invalid @enderror" value="{{ old('id_comentario', $asignaComentario?->id_comentario) }}" id="id_comentario" placeholder="Id Comentario">
            {!! $errors->first('id_comentario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_publicacion" class="form-label">{{ __('Id Publicacion') }}</label>
            <input type="text" name="id_publicacion" class="form-control @error('id_publicacion') is-invalid @enderror" value="{{ old('id_publicacion', $asignaComentario?->id_publicacion) }}" id="id_publicacion" placeholder="Id Publicacion">
            {!! $errors->first('id_publicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>