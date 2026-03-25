<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FaqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'name' => 'required|min:3|max:64',
        'locale' => 'nullable|array',
        'locale.*.question' => 'nullable|string',
        'locale.*.answer' => 'nullable|string',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'name.max' => 'El nombre debe tener menos de 64 caracteres',
        'locale.*.question.string' => 'La pregunta debe ser texto',
        'locale.*.answer.string' => 'La respuesta debe ser texto',
      ];
    }
}