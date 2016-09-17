<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos',function (Blueprint $table){

            $table->increments('id');
            $table->String('rua');
            $table->integer('numero');
            $table->String('cep');
            $table->integer('cidade_id')->unsigned();

            /**
             * Foreignkeys section
             */
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
