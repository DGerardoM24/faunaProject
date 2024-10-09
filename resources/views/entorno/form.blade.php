<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_entorno" class="form-label">{{ __('Id Entorno') }}</label>
            <input type="text" name="id_entorno" class="form-control @error('id_entorno') is-invalid @enderror" value="{{ old('id_entorno', $entorno?->id_entorno) }}" id="id_entorno" placeholder="Id Entorno">
            {!! $errors->first('id_entorno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="desc_entorno" class="form-label">{{ __('Desc Entorno') }}</label>
            <input type="text" name="desc_entorno" class="form-control @error('desc_entorno') is-invalid @enderror" value="{{ old('desc_entorno', $entorno?->desc_entorno) }}" id="desc_entorno" placeholder="Desc Entorno">
            {!! $errors->first('desc_entorno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>