<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Field\FieldContentModel;

class Equipment extends Model
{
    use FieldContentModel;

    /**
     * Mass assignment: allow attributes
     *
     * @var array
     */
    protected $fillable = ['equipment_type_id', 'observation'];

    /**
     * Retrive the equipment-type
     */
    public function equipmentType()
    {
      return $this->belongsTo(EquipmentType::class);
    }
}
