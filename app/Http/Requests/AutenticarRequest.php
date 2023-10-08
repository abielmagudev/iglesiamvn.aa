<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutenticarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'usuario' => [
                'required',
                'string',
                'min:6'
            ],
            'contrasena' => [
                'required',
                'string',
                'min:6'
            ],
        ];
    }

    public function passedValidation()
    { 
        $field_name = filter_var($this->usuario, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $this->merge([
            $field_name => $this->usuario,
            'password' => $this->contrasena
        ]);
    }
}