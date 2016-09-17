@extends('layouts/list')

@section('title', 'Gerenciar tipos de equipamentos')

@section('button-create', route('equipment.type.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Nome</th>
                <th>Grupo</th>
                <th>Portas habilitadas</th>
                <th>Portas concorrentes</th>
                <th>Qtd. portas</th>
                <th>Nº de equipamentos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($equipmentTypes as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->group->name }}</td>
                <td>
                    @if($type->uses_port)
                        Sim
                    @else
                        Não
                    @endif
                </td>
                <td>
                    @if($type->rival_port)
                        Sim
                    @else
                        Não
                    @endif
                </td>
                <td>
                    @if($type->uses_port)
                        {{ $type->num_ports }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $type->equipments->count() }}</td>
                <td>
                    <a href="{{ route('equipment.type.show', $type->id) }}"><i class="fa fa-fw fa-star text-primary"></i></a>
                    <a href="{{ route('equipment.type.edit', $type->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
