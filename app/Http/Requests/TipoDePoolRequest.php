<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TipoDePoolRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        
        switch ($this->method())
        {
            case 'POST':
                $rules['descricao'] = 'required|unique:tipo_pool';
                break;
            
            default:
                $rules['descricao'] = 'required';
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Preenchimento obrigatório!',
            'descricao.unique' => 'Atenção! Tipo já existente!'
        ];
    }
}
