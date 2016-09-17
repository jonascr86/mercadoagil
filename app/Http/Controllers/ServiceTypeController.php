<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Field;
use App\ServiceType;
use App\Http\Requests\FieldRequest;
use App\Traits\Field\FieldController;
use App\Http\Requests\ServiceTypeRequest;

class ServiceTypeController extends Controller
{

    use FieldController;

    /**
     * Display a listing of TipoServico.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceType = ServiceType::all();

        return view('services/type/index', compact('serviceType'));
    }

    /**
     * Update the specified TipoServico in storage.
     *
     * @param  App\Http\Requests\TipoServicoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceTypeRequest $request, ServiceType $type)
    {
        $type->update([
            'description' => $request->get('description')
        ]);

        return redirect()->back()->with('success', trans('tiposervico/message.success.update'));
    }

    public function storeDynamicField(FieldRequest $request)
    {
        $serviceType = ServiceType::find($request->input('type_id'));
        $serviceType->addField($this->addNewField($request));

        return redirect()->route('service.type.show', $serviceType->id);
    }

    /**
     * Display the specified TipoServico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceType = ServiceType::findOrFail($id);

        return view('services/type/show', compact('serviceType'));
    }

    /**
     * Show the form for creating a new TipoServico.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services/type/create');
    }

    public function edit($id)
    {
        $serviceType = ServiceType::findOrFail($id);

        return view('services/type/edit', compact('serviceType'));
    }

    /**
     * Store a newly created TipoServico in storage.
     *
     * @param  App\Http\Requests\TipoServicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceTypeRequest $request)
    {
        ServiceType::create([
            'description' => $request->input('description')
        ]);

        return redirect()->route('service.type.show')->with('success', trans('tiposervico/message.success.create'));
    }

    public function destroy(Request $request, ServiceType $service)
    {
        $service->delete();

        return redirect()->back()->with('success', 'Serviço excluído com sucesso');
    }
}
