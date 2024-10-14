<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaRutaRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            // No necesitas validar 'id_asigna_rutas' si es autogenerado
            'id_ruta' => 'required|exists:rutas,id_ruta',  // Verifica que el id_ruta existe en la tabla 'rutas'
            'id_especie' => 'required|exists:especies,id_especie',  // Verifica que el id_especie existe en la tabla 'especies'
        ];
    }
}
