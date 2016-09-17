<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{
    protected $fillable = ['descricao'];
    
    public function equipamentos()
    {
        return $this->hasMany(PopEquipamento::class, 'id_pop');
    }
}
