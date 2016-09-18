<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $appends = ['local'];
    
    public function getLocalAttribute()
    {
        return $this->nome . ' - ' . $this->uf;
    }
    
    /**
     * @return array
     */
    public static function listaCombo()
    {
        return self::orderBy('nome')->get()->lists('local', 'id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }
}
