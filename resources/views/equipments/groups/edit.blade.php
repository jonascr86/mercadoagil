@extends('layouts/default')

@section('title', 'Editar tipo de pool')

@section('content')
    <div class="row">
        {!! Form::model($equipmentGroup, ['route' => ['equipment.group.update', $equipmentGroup->id], 'method' => 'PUT']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-edit')
                </div>
                <div class="panel-body">
                    @include('equipments/groups/partials/forms')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
