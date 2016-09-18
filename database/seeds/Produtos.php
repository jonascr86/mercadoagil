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


        DB::table('produtos')->insert([
            [ 'nome' => 'Açucar Cristal 5Kg',
              'imagem' => 'assets/images/produtos/AcucarCristal5kg.png',
              'preco' => '10.98'],

            [ 'nome' => 'Creme de Leite',
              'imagem' => 'assets/images/produtos/Creme de Leite.jpg',
              'preco' => '2.60'],

            [ 'nome' => 'Creme dental',
              'imagem' => 'assets/images/produtos/Creme-dental-sorriso-90g.jpg',
              'preco' => '4.25'],

            [ 'nome' => 'Detergente',
              'imagem' => 'assets/images/produtos/Detergente Girasiol.jpg',
              'preco' => '2.50'],

            [ 'nome' => 'Erva Mate',
              'imagem' => 'assets/images/produtos/Erva Mate Chimango.jpg',
              'preco' => '8.85'],

            [ 'nome' => 'Farinha de Trigo',
              'imagem' => 'assets/images/produtos/Farinha-de-trigo-Nordeste.jpg',
              'preco' => '12.45'],

            [ 'nome' => 'Farofa Fritz e Frida',
              'imagem' => 'assets/images/produtos/Farofa Fritz Frida.jpg',
              'preco' => '12.45'],

            [ 'nome' => 'Leite Condensado',
              'imagem' => 'assets/images/produtos/Leite Condensado Moca.jpg',
              'preco' => '4.90'],

            [ 'nome' => 'Leite',
              'imagem' => 'assets/images/produtos/Leite_Languiru_1284-Edit.jpg',
              'preco' => '3.95'],

            [ 'nome' => 'Margarina',
              'imagem' => 'assets/images/produtos/Margarina sem sal.jpg',
              'preco' => '3.95'],

            [ 'nome' => 'Papel Toalha',
              'imagem' => 'assets/images/produtos/Papel Toalha.jpg',
              'preco' => '4.48'],



            ]
        );
        
    }
}
