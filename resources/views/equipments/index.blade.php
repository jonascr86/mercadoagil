@extends('layouts/list')

@section('title', 'Gerenciar equipamentos')

@section('button-create', route('equipment.create', request()->route('id')))

@section('panel-body')
    <h3>{{ $equipmentType->name }}</h3>
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>#</th>
                <th>Observação</th>
                @foreach($equipmentType->fields as $field)
                    @if($field->listable)
                    <th>{{ $field->label }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($equipments as $equipment)
            <tr>
            <td>{{ $equipment->id }}</td>
            <td>{{ $equipment->observation }}</td>
            @foreach($equipment->contents as $content)
                @if($content->field->listable)
                <td>{{ $content->value }}</td>
                @endif
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
