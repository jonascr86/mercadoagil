<?php

use Illuminate\Database\Seeder;

class Produtos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->truncate();

        $diego = \App\Produto::create([
            'nome' => 'Açucar Crista 5Kg',
            'imagem' => 'assets/images/produtos/AcucarCristal5kg.png',
            'preco' => '10.00',
        ]);
    }
}
