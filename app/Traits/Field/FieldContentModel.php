<?php

namespace App\Traits\Field;

use App\FieldContent;

trait FieldContentModel
{
    public function contents()
    {
      return $this->belongsToMany(FieldContent::class);
    }

    public function addFields(array $dynamics)
    {
        foreach ($dynamics as $fieldId => $fieldValue) {
            $fieldContent = FieldContent::create([
              'field_id' => $fieldId,
              'value' => $fieldValue
            ]);

            $this->contents()->attach($fieldContent);
        }
    }
}
