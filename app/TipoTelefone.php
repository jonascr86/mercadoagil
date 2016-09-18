<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTelefone extends Model
{
    protected $table = 'tipo_telefones';

    public function telefones()
    {
        return $this->hasMany('App\Telefone');
    }
}
