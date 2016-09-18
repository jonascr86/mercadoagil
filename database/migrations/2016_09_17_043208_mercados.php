<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Mercados
 *
 * @author  The scaffold-interface created at 2016-09-17 04:32:08pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Mercados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('mercados',function (Blueprint $table){

        $table->increments('id');
        
        $table->String('razao_social');
        
        $table->String('nome_fantasia');
        
        $table->boolean('ativo');
        
        /**
         * Foreignkeys section
         */
        
        $table->integer('endereco_id')->unsigned();
        $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');

        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('mercados');
    }
}
