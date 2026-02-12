<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
        'name' => 'required|min:3|max:64'
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El mínimo de caracteres permitidos para el nombre son 3',
        'name.max' => 'El máximo de caracteres permitidos para el nombre son 64'
      ];
    }
}