<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoController
 *
 * @author  The scaffold-interface created at 2016-09-17 04:36:07pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pedido extends Model
{
    public $timestamps = false;

    protected $table = 'pedidos';

	
	public function endereco()
	{
		return $this->belongsTo('App\Endereco','endereco_id');
	}

	
}
