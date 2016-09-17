<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopEquipamento extends Model
{
    protected $fillable = ['id_pop', 'id_equipamento'];
    
    public function equipamento()
    {
        return $this->belongsTo(Equipment::class, 'id_equipamento');
    }
}
