@extends('layouts/list')

@section('title', 'Gerenciar grupos de equipamentos')

@section('button-create', route('equipment.group.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipmentGroups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>
                    <a href="{{ route('equipment.group.edit', $group->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                    @include('layouts.modal_delete', ['route' => 'equipment.group.destroy', 'id' => $group->id])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
