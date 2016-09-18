<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Endereco;


/**
 * Class PedidoController
 *
 * @author  The scaffold-interface created at 2016-09-17 04:36:07pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $enderecos = Endereco::all()->lists('rua','id');
        
        return view('pedido.create',compact('enderecos'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();

        
        $pedido->data = $request->data;

        
        $pedido->situacao = $request->situacao;

        
        $pedido->retirar = $request->retirar;

        
        
        $pedido->endereco_id = $request->endereco_id;

        
        $pedido->save();

        return redirect('pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param        \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('pedido/'.$id);
        }

        $pedido = Pedido::findOrfail($id);
        return view('pedido.show',compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param        \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('pedido/'. $id . '/edit');
        }

        
        $enderecos = Endereco::all()->lists('rua','id');

        
        $pedido = Pedido::findOrfail($id);
        return view('pedido.edit',compact('pedido' ,'enderecos' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $pedido = Pedido::findOrfail($id);
    	
        $pedido->data = $request->data;
        
        $pedido->situacao = $request->situacao;
        
        $pedido->retirar = $request->retirar;
        
        
        $pedido->endereco_id = $request->endereco_id;

        
        $pedido->save();

        return redirect('pedido');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     * @param        \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/pedido/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$pedido = Pedido::findOrfail($id);
     	$pedido->delete();
        return URL::to('pedido');
    }
}
