<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cancion;

class CancionSaveRequest extends FormRequest
{
    public $answers;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => [
                'bail',
                'required',
                sprintf('unique:%s,%s,%s', Cancion::class, 'titulo', $this->answers['cancion_id']),
            ],
            'autor' => [
                'nullable',
                'string',
            ],
            'indicador_tempo' => [
                'required',
                sprintf('in:%s', $this->answers['indicadores_tempo_csv']),
            ],
            'estatus' => [
                'required',
                sprintf('in:%s', $this->answers['estatus_csv']),
            ],
            'url_referencia' => [
                'nullable',
                'string',
                'url'
            ],
            'etiquetas' => [
                'nullable',
                'string',
            ],
            'notas' => [
                'nullable',
                'string',
            ],
            'letra' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => __('Título es requerido'),
            'titulo.unique' => __('Escribe un título diferente'),
            'indicador_tempo.required' => __('Selecciona el indicador de tempo'),
            'indicador_tempo.in' => __('Selecciona un indicador de tempo válido'),
            'url_referencia.url' => __('Escribe un URL de referencia válido'),
        ];
    }

    public function prepareForValidation()
    {
        $this->answers = [
            'cancion_id' => is_object($this->route('cancion')) ? $this->route('cancion')->id : 0,
            'indicadores_tempo_csv' => implode(',', Cancion::getIndicadoresTempo()),
            'estatus_csv' => implode(',', Cancion::getEstatus()),
        ];
    }
}
