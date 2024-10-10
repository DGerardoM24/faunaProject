<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecyRequest extends FormRequest
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
            'id_especie' => 'required|exists:especies,id_especie', // Asegúrate de que la especie exista si se está actualizando
            'nombre_comun' => 'required|string|max:255', // Se puede hacer requerido dependiendo de tu lógica
            'nombre_cientifico' => 'required|string|max:255', // Se puede hacer requerido dependiendo de tu lógica
            'descripcion' => 'nullable|string', // Puedes hacer esto opcional
            'habitat' => 'nullable|string', // Puedes hacer esto opcional
            'id_entorno' => 'required|exists:entornos,id_entorno',
            'id_bandera' => 'required|exists:banderas,id_bandera',
            'id_estado_conservacion' => 'required|exists:estados_conservacion,id_estado_conservacion',
            'id_clase' => 'required|exists:clases,id_clase',
            'id_grupo' => 'required|exists:grupos,id_grupo',
            'id_orden' => 'required|exists:ordenes,id_orden',
            'id_familia' => 'required|exists:familias,id_familia',
        ];
    }
}
