<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EquipmentRequest extends Request
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
            'observation' => 'required',
            'dynamics' => 'required|array|dynamic_fields_exists',
            'equipment_type_id' => 'required|exists:equipment_types,id',
        ];
    }
}
