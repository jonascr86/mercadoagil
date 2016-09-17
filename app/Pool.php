<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = 'pool';

    protected $fillable = ['id_tipo_pool', 'descricao'];


    public function tipoPool(){
        return $this->belongsTo(TipoDePool::class, 'id_tipo_pool', 'id');
    }
    
    /**
     * Usado no componente pool
     * 
     * @return string
     */
    public static function obterPoolAleatorio($tipo)
    {
        $pools = Pool::where('id_tipo_pool', $tipo)->get();

        if ( $pools->count() > 0 )
        {
            return $pools[ array_rand($pools->toArray()) ]->descricao;
        }
        
        return null;
    }
    
    /**
     * Usado no componente pool para selection
     * 
     * @return array
     */
    public static function obterPoolsDoTipo($tipo)
    {
        return Pool::where('id_tipo_pool', $tipo)->lists('descricao', 'descricao');
    }
}
