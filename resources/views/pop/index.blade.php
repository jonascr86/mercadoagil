@extends('layouts/list')

@section('title', 'Gerenciar pop\'s')

@section('button-create', route('pop.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ( !empty($registros) )
                @foreach ($registros as $pop)
                    <tr>
                        <td>{{ $pop->descricao }}</td>
                        <td>
                            <a href="{{ route('pop.edit', $pop->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                            @include('layouts.modal_delete', ['route' => 'pop.destroy', 'id' => $pop->id])
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
