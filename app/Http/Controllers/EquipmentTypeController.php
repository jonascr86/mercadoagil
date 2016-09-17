<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Field;
use App\Product;
use App\FieldType;
use App\EquipmentType;
use App\Http\Requests;
use App\EquipmentGroup;
use App\Http\Requests\FieldRequest;
use App\Traits\Field\FieldController;
use App\Http\Requests\EquipmentTypeRequest;

class EquipmentTypeController extends Controller
{

    use FieldController;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentTypes = EquipmentType::all();

        return view('equipments/type/index', compact('equipmentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all()->sortBy('description')->lists('description', 'id');
        $equipmentGroups = EquipmentGroup::all()->sortBy('name')->lists('name', 'id');

        return view('equipments/type/create', compact('products', 'equipmentGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentTypeRequest $request)
    {
        $equipmentType = new EquipmentType([
            'name' => $request->input('name'),
            'product_id' => $request->input('product_id'),
            'equipment_group_id' => $request->input('equipment_group_id'),
            'uses_port' => $request->input('uses_port', 0),
            'rival_ports' => $request->input('rival_ports', 0)
        ]);

        if ($request->has('num_ports')) {
            $equipmentType->num_ports = $request->input('num_ports');
        }

        $equipmentType->save();

        return redirect()->route('equipment.type.show', $equipmentType->id);
    }

    public function storeDynamicField(FieldRequest $request)
    {
        $equipmentType = EquipmentType::find($request->input('type_id'));
        $equipmentType->addField($this->addNewField($request));

        return redirect()->route('equipment.type.show', $equipmentType->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipmentType = EquipmentType::findOrFail($id);

        return view('equipments/type/show', compact('equipmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all()->lists('description', 'id');
        $equipmentGroups = EquipmentGroup::all()->lists('name', 'id');
        $equipmentType = EquipmentType::findOrFail($id);

        return view('equipments/type/edit', compact('equipmentType', 'products', 'equipmentGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentTypeRequest $request, $id)
    {
        $equipmentType = EquipmentType::findOrFail($id);
        $equipmentType->name = $request->input('name');
        $equipmentType->product_id = $request->input('product_id');
        $equipmentType->equipment_group_id = $request->input('equipment_group_id');
        $equipmentType->uses_port = $request->input('uses_port', 0);
        $equipmentType->rival_ports = $request->input('rival_port', 0);

        if ($request->has('num_ports')) {
            $equipmentType->num_ports = $request->input('num_ports');
        }

        $equipmentType->update();

        return redirect()->route('equipment.type.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
