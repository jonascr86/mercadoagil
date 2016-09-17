<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PoolRequest extends Request
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
        return [
            'pools'  => 'required',
            'id_tipo_pool'  => 'required|exists:tipo_pool,id',
        ];
    }
}
