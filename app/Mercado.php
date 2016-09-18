<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MercadoController
 *
 * @author  The scaffold-interface created at 2016-09-17 04:32:08pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Mercado extends Model
{
    public $timestamps = false;

    protected $table = 'mercados';

	
	public function endereco()
	{
		return $this->belongsTo('App\Endereco','endereco_id');
	}

	
}
