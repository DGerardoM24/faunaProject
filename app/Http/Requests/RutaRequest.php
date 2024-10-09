<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RutaRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Asegúrate de que está autorizado
    }

    public function rules()
    {
        return [
            'id_ruta' => 'required|string|max:255',
            'desc_ruta' => 'required|string|max:255',
            'rango' => 'required|numeric|min:1|max:100',  // Valida el campo "rango"
        ];
    }


}
