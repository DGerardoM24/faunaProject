<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultimediaRequest extends FormRequest
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
            'id_multimedia' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'multimedia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
        ];
    }
}
