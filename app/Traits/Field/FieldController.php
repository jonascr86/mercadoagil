<?php

namespace App\Traits\Field;

use App\Field;
use App\Http\Requests\FieldRequest;

trait FieldController
{
    function addNewField(FieldRequest $request)
    {
        $field = new Field([
            'name' => $request->input('field_name'),
            'label' => $request->input('field_label'),
            'required' => $request->input('field_required', 0),
            'listable' => $request->input('field_listable', 0),
            'field_type_id' => $request->input('field_type_id'),
            'pool_type_id' => $request->input('pool_type_id'),
            'automatic' => $request->input('automatic', 0),
        ]);

        if ($request->has('field_default')) {
            $field->default = $request->input('field_default');
        }

        if ($request->has('field_length')) {
            $field->length = $request->input('field_length');
        }

        $field->save();

        return $field;
    }
}
