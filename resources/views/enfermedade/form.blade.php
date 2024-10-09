<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_enfermedad" class="form-label">{{ __('Id Enfermedad') }}</label>
            <input type="text" name="id_enfermedad" class="form-control @error('id_enfermedad') is-invalid @enderror" value="{{ old('id_enfermedad', $enfermedade?->id_enfermedad) }}" id="id_enfermedad" placeholder="Id Enfermedad">
            {!! $errors->first('id_enfermedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_enfermedad" class="form-label">{{ __('Nombre Enfermedad') }}</label>
            <input type="text" name="nombre_enfermedad" class="form-control @error('nombre_enfermedad') is-invalid @enderror" value="{{ old('nombre_enfermedad', $enfermedade?->nombre_enfermedad) }}" id="nombre_enfermedad" placeholder="Nombre Enfermedad">
            {!! $errors->first('nombre_enfermedad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $enfermedade?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="transmision" class="form-label">{{ __('Transmision') }}</label>
            <input type="text" name="transmision" class="form-control @error('transmision') is-invalid @enderror" value="{{ old('transmision', $enfermedade?->transmision) }}" id="transmision" placeholder="Transmision">
            {!! $errors->first('transmision', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_tipo" class="form-label">{{ __('Id Tipo') }}</label>
            <input type="text" name="id_tipo" class="form-control @error('id_tipo') is-invalid @enderror" value="{{ old('id_tipo', $enfermedade?->id_tipo) }}" id="id_tipo" placeholder="Id Tipo">
            {!! $errors->first('id_tipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>