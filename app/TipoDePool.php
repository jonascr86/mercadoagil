<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDePool extends Model
{
    protected $table = 'tipo_pool';
    protected $fillable = ['descricao'];
    
    /**
     * @return array
     */
    public static function obterLista()
    {
        return self::all()->lists('descricao', 'id');
    }
}
