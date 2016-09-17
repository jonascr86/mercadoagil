<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'enderecos_do_usuarios');
    }
}
