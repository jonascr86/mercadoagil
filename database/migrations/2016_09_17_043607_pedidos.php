<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Pedidos
 *
 * @author  The scaffold-interface created at 2016-09-17 04:36:07pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('pedidos',function (Blueprint $table){

        $table->increments('id');
        
        $table->date('data');
        
        $table->boolean('situacao');
        
        $table->boolean('retirar');
        
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
        Schema::drop('pedidos');
    }
}
