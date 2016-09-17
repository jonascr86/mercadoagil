<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EquipmentGroup;
use App\EquipmentType;
use App\Http\Requests\EquipmentGroupRequest;

class EquipmentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentGroups = EquipmentGroup::all();

        return view('equipments/groups/index', compact('equipmentGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipments/groups/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentGroupRequest $request)
    {
        EquipmentGroup::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('equipment.group.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        EquipmentGroup::findOrFail($id);

        return view('equipments/groups/edit', compact('equipmentGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        EquipmentGroup::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('equipment.group.index', $id)->with('success', 'Grupo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EquipmentGroup $group)
    {
        if ($group->EquipmentType->count() > 0) {
            return redirect()->back()->with('error', trans('grupoequipamento/message.error.exists', ['groupName' => $group->name])); 
        }

        $group->delete();

        return redirect()->back()->with('success', trans('grupoequipamento/message.success.delete'));
    }
}
