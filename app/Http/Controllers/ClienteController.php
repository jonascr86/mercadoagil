<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Cidade;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $model = new Cliente();
        
        if ( $request->has('tipo') )
        {
            $model = $model->where('tipo', $request->get('tipo'));
        }
        
        return view('cliente/index', [
            'clientes' => $model->get(),
        ]);
    }

    public function create()
    {
        return $this->formView('cliente/create');
    }
    
    public function edit($id)
    {
        return $this->formView('cliente/edit', $id);
    }

    private function formView($view, $id = null)
    {
        return view($view, [
            'model' => Cliente::find($id),
            'tipos' => Cliente::listarTipos(),
            'tipoFisica' => Cliente::TIPO_FISICA,
            'tipoJuridica' => Cliente::TIPO_JURIDICA,
            'cidades' => Cidade::listaCombo(),
        ]);
    }
    
    public function update(ClienteRequest $request, $id)
    {
        Cliente::findOrFail($id)->update($request->getData());

        return redirect('cadastro/cliente')->with('success', 'Cliente atualizado com sucesso');
    }

    public function store(ClienteRequest $request)
    {
        Cliente::create( $request->getData() );

        return redirect('cadastro/cliente')->with('success', 'Cliente criado com sucesso');
    }
    
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->back()->with('success', 'Cliente excluído com sucesso');
    }
}
