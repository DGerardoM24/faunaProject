<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_publicacion" class="form-label">{{ __('Id Publicacion') }}</label>
            <input type="text" name="id_publicacion" class="form-control @error('id_publicacion') is-invalid @enderror" value="{{ old('id_publicacion', $publicacione?->id_publicacion) }}" id="id_publicacion" placeholder="Id Publicacion">
            {!! $errors->first('id_publicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $publicacione?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Id Especie') }}</label>
            <input type="text" name="id_especie" class="form-control @error('id_especie') is-invalid @enderror" value="{{ old('id_especie', $publicacione?->id_especie) }}" id="id_especie" placeholder="Id Especie">
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_p" class="form-label">{{ __('Fecha P') }}</label>
            <input type="text" name="fecha_p" class="form-control @error('fecha_p') is-invalid @enderror" value="{{ old('fecha_p', $publicacione?->fecha_p) }}" id="fecha_p" placeholder="Fecha P">
            {!! $errors->first('fecha_p', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>