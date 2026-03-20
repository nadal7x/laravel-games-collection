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

    protected function prepareForValidation()
    {
        if ($this->has('images') && is_string($this->images)) {
            $this->merge([
                'images' => json_decode($this->images, true),
            ]);
        }
    }

    public function rules()
    {
      return [
        'name' => 'required|min:3|max:64',
        'url' => 'required|min:3|max:255',
        'release_date' => 'required|date',
        'developer' => 'required|min:3|max:64',
        'publisher' => 'required|min:3|max:64',
        'rating' => 'required|min:1|max:100',
        'tags' => 'nullable|array',
        'platforms' => 'nullable|array',
        'images' => 'nullable|array',
        'images.*' => 'nullable|array',
        'images.*.*' => 'nullable|array',
        'images.*.title' => 'nullable|string',
        'images.*.alt' => 'nullable|string',
        'images.*.filename' => 'nullable|string',
        'locale.*.title' => 'nullable|max:64',
        'locale.*.description' => 'nullable|max:255',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'name.max' => 'El nombre debe tener menos de 64 caracteres',
        'url.required' => 'La URL es obligatoria',
        'url.url' => 'La URL debe ser una URL valida',
        'url.min' => 'La URL debe tener al menos 3 caracteres',
        'url.max' => 'La URL debe tener menos de 255 caracteres',
        'release_date.required' => 'La fecha de lanzamiento es obligatoria',
        'release_date.date' => 'La fecha de lanzamiento debe ser una fecha valida',
        'developer.required' => 'El desarrollador es obligatorio',
        'developer.min' => 'El desarrollador debe tener al menos 3 caracteres',
        'developer.max' => 'El desarrollador debe tener menos de 64 caracteres',
        'publisher.required' => 'El editor es obligatorio',
        'publisher.min' => 'El editor debe tener al menos 3 caracteres',
        'publisher.max' => 'El editor debe tener menos de 64 caracteres',
        'rating.required' => 'La calificación es obligatoria',
        'rating.min' => 'La calificación debe tener al menos 1 caracter',
        'rating.max' => 'La calificación debe tener menos de 100 caracteres',
        'locale.*.title.max' => 'El título de la imagen debe tener menos de 64 caracteres',
        'locale.*.description.max' => 'La descripción de la imagen debe tener menos de 255 caracteres',
      ];
    }
}