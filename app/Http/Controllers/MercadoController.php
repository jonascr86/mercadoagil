<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mercado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Endereco;


/**
 * Class MercadoController
 *
 * @author  The scaffold-interface created at 2016-09-17 04:32:08pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class MercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $mercados = Mercado::all();
        return view('mercado.index',compact('mercados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $enderecos = Endereco::all()->lists('rua','id');
        
        return view('mercado.create',compact('enderecos'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mercado = new Mercado();

        
        $mercado->razao_social = $request->razao_social;

        
        $mercado->nome_fantasia = $request->nome_fantasia;

        
        $mercado->ativo = $request->ativo;

        
        
        $mercado->endereco_id = $request->endereco_id;

        
        $mercado->save();

        return redirect('mercado');
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
            return URL::to('mercado/'.$id);
        }

        $mercado = Mercado::findOrfail($id);
        return view('mercado.show',compact('mercado'));
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
            return URL::to('mercado/'. $id . '/edit');
        }

        
        $enderecos = Endereco::all()->lists('rua','id');

        
        $mercado = Mercado::findOrfail($id);
        return view('mercado.edit',compact('mercado' ,'enderecos' ) );
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
        $mercado = Mercado::findOrfail($id);
    	
        $mercado->razao_social = $request->razao_social;
        
        $mercado->nome_fantasia = $request->nome_fantasia;
        
        $mercado->ativo = $request->ativo;
        
        
        $mercado->endereco_id = $request->endereco_id;

        
        $mercado->save();

        return redirect('mercado');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/mercado/'. $id . '/delete/');

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
     	$mercado = Mercado::findOrfail($id);
     	$mercado->delete();
        return URL::to('mercado');
    }
}
