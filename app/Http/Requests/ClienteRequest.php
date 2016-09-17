<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Cliente;

class ClienteRequest extends Request
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
        $rules['cep'] = 'required';
        $rules['email'] = 'required';
        $rules['id_cidade'] = 'required';
        
        switch ($this->method())
        {
            case 'POST': // insert
                $rules['nome'] = 'required|unique:clientes';
                break;
            
            default: // update
                $rules['nome'] = 'required';
                break;
        }
        
        switch ($this->get('tipo'))
        {
            case Cliente::TIPO_FISICA:
                $rules['cpf'] = 'required';
                $rules['rg'] = 'required';
                $rules['data_nascimento'] = 'required';
                break;
            
            case Cliente::TIPO_JURIDICA:
                $rules['cnpj'] = 'required';
//                $rules['ie'] = 'required';
//                $rules['nome_fantasia'] = 'required';
                break;
        }
        
        return $rules;
    }
    
    public function getData()
    {
        $data = array_filter($this->all());
        $data['cpf_cnpj'] = $this->input('tipo') == Cliente::TIPO_FISICA ? $this->input('cpf') : $this->input('cnpj');
        $data['rg_ie'] = $this->input('tipo') == Cliente::TIPO_FISICA ? $this->input('rg') : $this->input('ie');

        return $data;
    }
}
