<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cidade;

class Cliente extends Model
{
    const TIPO_FISICA = 'F';
    const TIPO_JURIDICA = 'J';
 
    /**
     * Ver metodos get***Attribute().
     * Isso faz popular corretamente os campos do formulario Cliente.
     *
     * @var array
     */
    protected $appends = ['cpf', 'cnpj', 'rg', 'ie'];
    
    protected $fillable = [
        'nome',
        'nome_fantasia',
        'cep',
        'bairro',
        'endereco',
        'numero',
        'complemento',
        'observacao',
        'telefone',
        'celular',
        'email',
        'email_alternativo',
        'site',
        'email_nfe',
        'cpf_cnpj',
        'rg_ie',
        'data_nascimento',
        'tipo',
        'id_cidade'];
    
    public function cidade()
    {
        return $this->belongsTo(Cidade::CLASS, 'id_cidade');
    }
    
    public static function listarTipos()
    {
        return [
            self::TIPO_FISICA => 'Pessoa física',
            self::TIPO_JURIDICA => 'Pessoa jurídica',
        ];
    }
    
    public function getCpfAttribute()
    {
        return $this->cpf_cnpj;
    }
    
    public function getCnpjAttribute()
    {
        return $this->cpf_cnpj;
    }
    
    public function getRgAttribute()
    {
        return $this->rg_ie;
    }
    
    public function getieAttribute()
    {
        return $this->rg_ie;
    }
}
