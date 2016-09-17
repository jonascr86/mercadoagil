<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipment;
use App\FieldContent;
use App\EquipmentType;
use App\Http\Requests;
use App\Http\Requests\EquipmentRequest;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $equipmentType = EquipmentType::findOrFail($id);

        return view('equipments/create', compact('equipmentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        $equipment = Equipment::create([
          'equipment_type_id' => $request->route('id'),
          'observation' => $request->input('observation')
        ]);

        $equipment->addFields($request->input('dynamics'));

        return redirect()->route('equipment.show', $request->route('id'));
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
        $equipments = $equipmentType->equipments;

        return view('equipments/index', compact('equipments', 'equipmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
