<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PopRequest;
use App\Pop;
use App\PopEquipamento;
use App\Equipment;
use App\EquipmentType;
use App\EquipmentGroup;

class PopController extends Controller
{   
    public function index()
    {
        return view('pop/index', ['registros' => Pop::all()]);
    }

    public function create()
    {
        return view('pop/create', [
            'tipoEquipamento' => EquipmentType::where("equipment_group_id", EquipmentGroup::POP )->lists('name', 'id'),
        ]);
    }
    
    public function edit($id)
    {
        return view('pop/edit', [
            'tipoEquipamento' => EquipmentType::where("equipment_group_id", EquipmentGroup::POP )->lists('name', 'id'),
            'equipamentosAdicionados' => PopEquipamento::where('id_pop', $id)->get(),
            'model' => Pop::find($id)
        ]);
    }

    public function update(PopRequest $request, $id)
    {
        $this->saveAll($request, $id);
        
        return redirect('pop')->with('success', 'Pop atualizado com sucesso');
    }

    public function store(PopRequest $request)
    {
        $this->saveAll($request);

        return redirect('pop')->with('success', 'Pop criado com sucesso');
    }
    
    private function saveAll(PopRequest $request, $id = null)
    {
        $pop = $id ? Pop::find($id) : new Pop();
        $pop->descricao = $request->get('descricao');
        $pop->equipamentos()->delete();
        $pop->save();

        foreach ( (array)$request->input('equipamento') as $equipamentoId )
        {
            $popEquipamento = new PopEquipamento();
            $popEquipamento->id_pop = $pop->id;
            $popEquipamento->id_equipamento = $equipamentoId;
            
            $pop->equipamentos->add($popEquipamento);
        }
        
        return $pop->push();
    }
    
    public function destroy($id)
    {
        PopEquipamento::where('id_pop', $id)->delete();
        Pop::destroy($id);
        
        return redirect()->back()->with('success', 'Pop excluído com sucesso');
    }
    
    public function listarEquipamentos($tipo)
    {
        $equiptos = Equipment::where('equipment_type_id', $tipo)->lists('observation', 'id');
        
        return response()->json($equiptos);
    }
}