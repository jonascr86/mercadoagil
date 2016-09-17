<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Telefones
 *
 * @author  The scaffold-interface created at 2016-09-17 02:16:59pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Telefones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('telefones',function (Blueprint $table){

        $table->increments('id');
        $table->String('numero');
        $table->integer('user_id')->unsigned();
        $table->integer('tipo_telefone_id')->unsigned();

        /**
         * Foreignkeys section
         */
        $table->foreign('tipo_telefone_id')->references('id')->on('tipo_telefones')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('telefones');
    }
}
