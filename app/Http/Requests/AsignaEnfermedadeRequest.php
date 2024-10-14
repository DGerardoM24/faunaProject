<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaEnfermedadeRequest extends FormRequest
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
            'id_enfermedad' => 'required|exists:enfermedades,id_enfermedad', // Asegúrate de que esta tabla y campo existan
            'id_especie' => 'required|exists:especies,id_especie',           // Asegúrate de que esta tabla y campo existan
            // Agrega otras reglas de validación según sea necesario
        ];
    }
}
