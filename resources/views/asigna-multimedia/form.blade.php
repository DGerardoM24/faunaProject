
<div class="row padding-1 p-1">
    <div class="col-md-12">
        <!-- Campo oculto para Id Asigna Multimedia -->
        <input type="hidden" name="id_asigna_multimedia" value="{{ old('id_asigna_multimedia', $asignaMultimedia?->id_asigna_multimedia) }}" id="id_asigna_multimedia">

        <!-- Seleccionar la multimedia por su nombre y vista previa de la imagen -->
        <div class="form-group mb-2 mb20">
            <label for="id_imagen" class="form-label">{{ __('Seleccionar Multimedia') }}</label>
            <select name="id_imagen" class="form-control @error('id_imagen') is-invalid @enderror" id="id_imagen">
                <option value="">{{ __('Selecciona una multimedia') }}</option>
                @foreach($multimedia as $item)
                    <option value="{{ $item->id_multimedia }}" {{ old('id_imagen', $asignaMultimedia?->id_imagen) == $item->id_multimedia ? 'selected' : '' }}>
                        {{ $item->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- Mostrar una vista previa de la imagen seleccionada -->
        <div class="form-group mb-2 mb20">
            <label for="imagen_preview" class="form-label">{{ __('Vista previa de la imagen') }}</label>
            <div id="imagen_preview">
                @if($asignaMultimedia && $asignaMultimedia->imagen)
                    <img src="{{ asset('storage/' . $asignaMultimedia->imagen->multimedia) }}" alt="Imagen seleccionada" class="img-thumbnail" style="max-width: 200px;">
                @else
                    <p>No hay imagen seleccionada.</p>
                @endif
            </div>
        </div>

        <!-- Seleccionar la especie (ya implementado) -->
        <div class="form-group mb-2 mb20">
            <label for="id_especie" class="form-label">{{ __('Especie') }}</label>
            <select name="id_especie" class="form-control @error('id_especie') is-invalid @enderror">
                <option value="">{{ __('Selecciona una especie') }}</option>
                @foreach($especies as $especie)
                    <option value="{{ $especie->id_especie }}" {{ old('id_especie', $asignaMultimedia?->id_especie) == $especie->id_especie ? 'selected' : '' }}>
                        {{ $especie->nombre_comun }} ({{ $especie->nombre_cientifico }})
                    </option>
                @endforeach
            </select>
            {!! $errors->first('id_especie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>

    <script>
        document.getElementById('id_imagen').addEventListener('change', function () {
            var selectedImageId = this.value;
            var imagenes = @json($multimedia);  // Pasar las imágenes desde el servidor a JavaScript
            var imagenPreviewDiv = document.getElementById('imagen_preview');

            // Limpiar la vista previa actual
            imagenPreviewDiv.innerHTML = '';

            // Buscar la imagen seleccionada
            var imagenSeleccionada = imagenes.find(imagen => imagen.id_multimedia == selectedImageId);

            if (imagenSeleccionada) {
                // Crear y mostrar la imagen en la vista previa
                var imgElement = document.createElement('img');
                imgElement.src = "{{ asset('storage') }}/" + imagenSeleccionada.multimedia;  // Ruta de la imagen
                imgElement.classList.add('img-thumbnail');
                imgElement.style.maxWidth = '200px';

                imagenPreviewDiv.appendChild(imgElement);
            } else {
                imagenPreviewDiv.innerHTML = '<p>No hay imagen seleccionada.</p>';
            }
        });
    </script>

</div>
