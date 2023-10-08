<?php

namespace App\Http\Requests;

use App\Models\Cantante;
use App\Models\CancionCantante;
use Illuminate\Foundation\Http\FormRequest;

class InterpreteSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cantante' => [
                'bail',
                'required',
                sprintf('exists:%s,id', Cantante::class)
            ],
            'cifrado_tonal' => [
                'required',
                sprintf('in:%s', implode(',', CancionCantante::getCifradosTonales()))
            ],
            'armonia_tonal' => [
                'required',
                sprintf('in:%s', implode(',', CancionCantante::getArmoniasTonales()))
            ],
            'notas' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'cifrado_tonal.required' => __('Selecciona el cifrado tonal'),
            'cifrado_tonal.in' => __('Selecciona un cifrado tonal válido'),
            'armonia_tonal.required' => __('Selecciona la armonía tonal'),
            'armonia_tonal.in' => __('Selecciona una armonía tonal válida'),
        ];
    }
}
