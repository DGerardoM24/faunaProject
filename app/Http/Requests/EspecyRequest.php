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
			'id_especie' => 'required',
			'nombre_comun' => 'string',
			'nombre_cientifico' => 'string',
			'descripcion' => 'string',
			'habitad' => 'string',
			'id_entorno' => 'required',
			'id_bandera' => 'required',
        ];
    }
}
