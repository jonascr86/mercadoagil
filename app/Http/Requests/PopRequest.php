<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PopRequest extends Request
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
                $rules['descricao'] = 'required|unique:pops';
                break;
            
            default:
                $rules['descricao'] = 'required';
                break;
        }
        
        return $rules;
    }
}
