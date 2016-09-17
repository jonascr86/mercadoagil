<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    const TYPE_POOL = 5;
    

    /**
     * Mass assignment: allow attributes
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Retrive all the fields according to the field-type
     */
    public function fields()
    {
      return $this->hasMany(Field::class);
    }
}
