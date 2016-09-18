<?php

namespace App\Http\Controllers\Site;

use App\Produto;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){



        return view('site/home');
    }

    public function itens()
    {
        $produtos = Produto::all();
        return view('site/itens', compact('produtos'));
    }

    public function produtoSimples()
    {
        return view('site/produtosimples');
    }
}
