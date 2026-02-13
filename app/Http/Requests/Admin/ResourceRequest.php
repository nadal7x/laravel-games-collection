<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResourceRequest extends FormRequest
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
        'description' => 'required|min:3|max:255',
        'url' => 'required|url|max:255',
        'release_date' => 'required|date',
        'developer' => 'required|min:3|max:64',
        'publisher' => 'required|min:3|max:64',
        'rating' => 'nullable|numeric|min:0|max:100|decimal:2',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El mínimo de caracteres permitidos para el nombre son 3',
        'name.max' => 'El máximo de caracteres permitidos para el nombre son 64',
        'description.required' => 'La descripción es obligatoria',
        'description.min' => 'El mínimo de caracteres permitidos para la descripción son 3',
        'description.max' => 'El máximo de caracteres permitidos para la descripción son 255',
        'url.required' => 'La URL es obligatoria',
        'url.url' => 'El formato de URL es incorrecto',
        'url.max' => 'El máximo de caracteres permitidos para la URL son 255',
        'release_date.required' => 'La fecha de lanzamiento es obligatoria',
        'release_date.date' => 'El formato de fecha de lanzamiento es incorrecto',
        'developer.required' => 'El desarrollador es obligatorio',
        'developer.min' => 'El mínimo de caracteres permitidos para el desarrollador son 3',
        'developer.max' => 'El máximo de caracteres permitidos para el desarrollador son 64',
        'publisher.required' => 'El publisher es obligatorio',
        'publisher.min' => 'El mínimo de caracteres permitidos para el publisher son 3',
        'publisher.max' => 'El máximo de caracteres permitidos para el publisher son 64',
        'rating.numeric' => 'La calificación debe ser un número',
        'rating.min' => 'La calificación mínima es 0',
        'rating.max' => 'La calificación máxima es 100',
      ];
    }
}