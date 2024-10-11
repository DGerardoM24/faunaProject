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
            
            'nombre_comun' => 'required|string|max:255', // Se puede hacer requerido dependiendo de tu lógica
            'nombre_cientifico' => 'required|string|max:255', // Se puede hacer requerido dependiendo de tu lógica
            'descripcion' => 'nullable|string', // Puedes hacer esto opcional
            'habitat' => 'nullable|string', // Puedes hacer esto opcional
            'id_dieta' => 'required|exists:dietas,id_dieta',
            'id_familia' => 'required|exists:familias,id_familia',
            'id_orden' => 'required|exists:ordenes,id_orden',
            'id_clase' => 'required|exists:clases,id_clase',
            'id_entorno' => 'required|exists:entornos,id_entorno',
            'id_bandera' => 'required|exists:banderas,id_bandera',
            'tamanio' => 'required|numeric|min:0',
            'id_estado_conservacion' => 'required|exists:estados_conservacions,id_estado_conservacion',
            'id_grupo' => 'required|exists:grupos,id_grupo',
        ];
    }
}
