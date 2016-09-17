<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FieldRequest extends Request
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
            'field_name' => 'required|string|unique:fields,name',
            'field_type_id' => 'required|exists:field_types,id',
            'field_label' => 'required|string',
            'field_default' => '',
            'field_required' => 'boolean',
            'field_listable' => 'boolean',
            'field_length' => 'numeric',
            'type_id' => 'required|numeric'
        ];
    }
}
