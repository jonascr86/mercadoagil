<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TelefoneController
 *
 * @author  The scaffold-interface created at 2016-09-17 02:16:59pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Telefone extends Model
{
    public $timestamps = false;

    protected $table = 'telefones';

	
	public function tipoTelefone()
	{
		return $this->belongsTo('App\TipoTelefone','tipo_telefone_id');
	}

	
}
