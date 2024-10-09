<form action="{{ route('multimedia.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row padding-1 p-1">
        <div class="col-md-12">
            <div class="form-group mb-2 mb20">
                <label for="id_multimedia" class="form-label">{{ __('Id Multimedia') }}</label>
                <input type="text" name="id_multimedia" class="form-control @error('id_multimedia') is-invalid @enderror" value="{{ old('id_multimedia', $multimedia?->id_multimedia) }}" id="id_multimedia" placeholder="Id Multimedia">
                {!! $errors->first('id_multimedia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $multimedia?->nombre) }}" id="nombre" placeholder="Nombre">
                {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2 mb20">
                <label for="multimedia" class="form-label">{{ __('Multimedia') }}</label>
                <input type="file" name="multimedia" class="form-control @error('multimedia') is-invalid @enderror">
                {!! $errors->first('multimedia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</form>
