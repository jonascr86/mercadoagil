<?php

namespace App\Traits\Field;

use App\Field;

trait FieldModel
{
    public function fields()
    {
      return $this->belongsToMany(Field::class)->withTimestamps();
    }

    public function addField(Field $field)
    {
        $this->fields()->attach($field);
    }
}
