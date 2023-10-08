<?php

namespace App\Http\Requests;

use App\Models\Cantante;
use Illuminate\Foundation\Http\FormRequest;

class CantanteSaveRequest extends FormRequest
{
    public $answers;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => [
                'bail',
                'required',
                sprintf('unique:%s,nombre,%s', Cantante::class, $this->answers['cantante_id'])
            ],
            'notas' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function prepareForValidation()
    {
        $this->answers = [
            'cantante_id' => $this->route('cantante')->id ?? 0
        ];
    }
}
