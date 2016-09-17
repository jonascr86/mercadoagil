<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    /**
     * Mass assignment: allow attributes
     *
     * @var array
     */
    protected $fillable = ['name', 'field_type_id', 'default', 'label', 'listable', 'required', 'automatic', 'pool_type_id'];

    /**
     * Retrive the field type
     */
    public function type()
    {
      return $this->belongsTo(FieldType::class, 'field_type_id', 'id');
    }

    /**
     * Retrive the equipment-type that uses this field
     */
    public function equipment_type()
    {
      return $this->belongsToMany(EquipmentType::class)->withTimestamps();;
    }
}
