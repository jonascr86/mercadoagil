<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller{

    public function send() {
        $title   = 'Mercado Agil - Novo Pedido';

        Mail::send('email', ['title' => $title], function ($message) {
            $message->subject('Mercado Agil - Novo Pedido');
            $message->from('micheldeconto@gmail.com', 'Michel de Conto');
            $message->to('micheldeconto@gmail.com');
        });

        return response()->json(['message' => 'Request completed']);

    }
}
