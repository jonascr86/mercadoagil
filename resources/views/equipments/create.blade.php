@extends('layouts/default')

@section('title', "Criar equipamento {$equipmentType->name}")

@section('content')
    <div class="row">
        {!! Form::open(['route' => ['equipment.store', request()->route('id')], 'method' => 'POST']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-create')
                </div>
                <div class="panel-body">
                    <div class="col-xs-12">
                        {!! Form::textBox('observation', null, 'Observação') !!}
                        {!! Form::hidden('equipment_type_id', request()->route('id')) !!}
                    </div>
                    @include('layouts/dynamic-fields/fields', ['fields' => $equipmentType->fields])
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
