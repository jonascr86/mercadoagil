<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){



        return view('site/home');
    }

    public function itens()
    {
        return view('site/itens');
    }

    public function produtoSimples()
    {
        return view('site/produtosimples');
    }
}
