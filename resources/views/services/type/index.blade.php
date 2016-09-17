@extends('layouts/list')

@section('title', 'Gerenciar tipo de serviço')

@section('button-create', route('service.type.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($serviceType as $serviceType)
                <tr>
                    <td>{{ $serviceType->description }}</td>
                    <td>
                        <a href="{{ route('service.type.edit', $serviceType->id) }}">
                            <i class="fa fa-fw fa-pencil text-warning"></i>
                        </a>
                        <a href="{{ route('service.type.show', $serviceType->id) }}">
                            <i class="fa fa-fw fa-star text-info"></i>
                        </a>
                        {{-- @include('layouts.modal_delete', ['route' => 'service.type.destroy', 'id' => $serviceType->id]) --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nenhum tipo de serviço cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
