@extends('layouts/default')

@section('title', 'Novo tipo de equipamento')

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">{{ $equipmentType->name }}</h4>
                <div class="btn-group pull-right" role="group">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#dynamic-field">Adicionar novo campo</a>
                    <a href="{!! route('equipment.type.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> @lang('button.back')</a>
                </div>
            </div>
            <div class="panel-body">
                @forelse($equipmentType->fields as $field)
                    <div class="col-xs-4">
                        {!! Form::textBoxAddon('demo_' . $field->id, $field->default, 'fa fa-trash-o', $field->label, ['disabled']) !!}
                    </div>
                @empty
                    <div class="alert alert-warning">Nenhum campo foi criado para esse tipo e equipamento.</div>
                @endforelse
            </div>
        </div>
    </div>
    @include('layouts/dynamic-fields/modal', [
        'formOpen' => ['route' => 'equipment.type.dynamic-field'],
        'typeId' => request()->route('type')
    ])
@stop
