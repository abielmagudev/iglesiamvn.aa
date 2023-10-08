<?php

namespace App\Http\Requests;

use App\Models\Cancion;
use Illuminate\Foundation\Http\FormRequest;

class VersionSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'url_referencia' => [
                'required',
                'url'
            ],
            'notas' => [
                'nullable',
                'string',
            ]
        ];
    }

    public function messages()
    {
        return [
            'url_referencia.required' => __('La URL de referencia es requerida'),
            'url_referencia.url' => __('Escribe una URL de referencia válida'),
        ];
    }

    public function validated()
    {
        if(! $this->isMethod('post') )
            return parent::validated();

        return array_merge(parent::validated(), [
            'cancion_id' => $this->route('cancion')->id,
        ]);
    }
}
