<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EquipmentTypeRequest extends Request
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
            'name' => 'required|min:3',
            'product_id' => 'required|exists:products,id',
            'equipment_group_id' => 'required|exists:equipment_groups,id',
            'uses_port' => 'boolean',
            'rival_port' => 'boolean',
            'num_ports' => 'required_with:uses_port|numeric'
        ];
    }
}
