<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WebartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique(table: 'webarts', column: 'name')->ignore(id: request('webarts'), idColumn: 'id'),
            ],
            'img_back' => [
                'required',
                'file',
                Rule::unique(table: 'webarts', column: 'img_back')->ignore(id: request('webarts'), idColumn: 'id'),
            ],
            'img_webart' => [
                'required',
                'file',
                Rule::unique(table: 'webarts', column: 'img_webart')->ignore(id: request('webarts'), idColumn: 'id'),
            ],
            'target' => [
                'required',
                'file',
                Rule::unique(table: 'webarts', column: 'target')->ignore(id: request('webarts'), idColumn: 'id'),
            ]
           
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('El campo nombre es obligatorio.'),
            'name.string' => __('El campo nombre debe ser una cadena de texto.'),
            'name.unique' => __('El campo nombre ya está en uso.'),

            'img_back.required' => __('El campo imagen back es obligatorio.'),
            'img_back.file' => __('El campo imagen back debe ser una cadena de texto.'),
            'img_back.unique' => __('El campo imagen back ya está en uso.'),

            'img_webart.required' => __('El campo imagen webart es obligatorio.'),
            'img_webart.file' => __('El campo imagen webart debe ser una cadena de texto.'),
            'img_webart.unique' => __('El campo imagen webart ya está en uso.'),

            'target.required' => __('El campo target es obligatorio.'),
            'target.file' => __('El campo target debe ser una cadena de texto.'),
            'target.unique' => __('El campo target ya está en uso.'),
      
        ];
    }
}
