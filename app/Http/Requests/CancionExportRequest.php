<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancionExportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'formato' => [
                'required',
                'in:excel'
            ],
        ];
    }

    public function withValidator($validator)
    {
        if( $validator->fails()  )
            session()->flash('danger', 'Formato para exportar no válido');
    }
}
