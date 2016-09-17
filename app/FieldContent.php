<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldContent extends Model
{
    /**
     * Mass assignment: allow attributes
     *
     * @var array
     */
    protected $fillable = ['value', 'field_id'];

    /**
     * Retrive the field as content
     */
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
