@extends('layouts/list')

@section('title', 'Gerenciar tipo de pools')

@section('button-create', route('pool.tipo.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Descrição</th>
                <th>@lang('groups/table.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposPoll as $tipoPoll)
                <tr>
                    <td>{{ $tipoPoll->descricao }}</td>
                    <td>
                        <a href="{{ route('pool.tipo.edit', $tipoPoll->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                        @include('layouts.modal_delete', ['route' => 'pool.tipo.destroy', 'id' => $tipoPoll->id])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
