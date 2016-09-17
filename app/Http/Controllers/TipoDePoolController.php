<?php

namespace App\Http\Controllers;

use App\TipoDePool;
use App\Http\Requests\TipoDePoolRequest;

class TipoDePoolController extends Controller
{

    /**
     * Display a listing of Pools.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPoll = TipoDePool::all();

        return view('tipopool/index', compact('tiposPoll'));
    }

    /**
     * Show the form for creating a new TipoDePool.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipopool/create');
    }
    
    public function edit($id)
    {
        return view('tipopool/edit', ['model' => TipoDePool::find($id)]);
    }

    /**
     * Update the specified TipoDePool in storage.
     *
     * @param  App\Http\Requests\TipoDePoolRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoDePoolRequest $request, $id)
    {
        TipoDePool::findOrFail($id)->update([
            'descricao' => $request->get('descricao')
        ]);

        return redirect('pool/tipo')->with('success', 'Tipo atualizado com sucesso');
    }

    /**
     * Store a newly created TipoDePool in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDePoolRequest $request)
    {
        TipoDePool::create([
            'descricao' => $request->input('descricao')
        ]);

        return redirect('pool/tipo')->with('success', 'Tipo criado com sucesso');
    }
    
    public function destroy($id)
    {
        TipoDePool::destroy($id);
        return redirect()->back()->with('success', 'Tipo excluído com sucesso');
    }
}
