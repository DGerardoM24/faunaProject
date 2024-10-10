<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnfermedadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nombre_enfermedad' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'transmision' => 'required|string',
            'id_tipo' => 'required|exists:tipo_enfermedades,id_tipo', // Asegura que el id_tipo exista en la tabla de tipo_enfermedades
        ];
    }
}
