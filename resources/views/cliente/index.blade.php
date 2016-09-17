@extends('layouts/list')

@section('title', 'Gerenciar clientes')

@section('button-create', route('cadastro.cliente.create'))

@section('panel-heading')
<form>
    <fieldset>
        <legend>Filtro:</legend>
        <div class="row">
            <div class="col-xs-6">
                <select name="tipo" aria-controls="table" class="form-control input-sm">
                    @foreach (['' => 'Todos']+\App\Cliente::listarTipos() as $key => $val)
                    <option {{ request('tipo') == $key ? 'selected' : '' }}
                            value="{{ $key }}">
                        {{ $val }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6">
                <button class="btn btn-effect-ripple btn-primary">Filtrar</button>
            </div>
        </div>
    </fieldset>
</form>
@stop

@section('panel-body')
<table class="table" id="table">
    <thead>
        <tr class="filters">
            <th>Nome</th>
            <th>CPF / CNPJ</th>
            <th>Cidade</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if ( !empty($clientes) )
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf_cnpj }}</td>
                <td>{{ $cliente->cidade->local }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->email }}</td>
                <td>
                    <a href="{{ route('cadastro.cliente.edit', $cliente->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                    @include('layouts.modal_delete', ['route' => 'cadastro.cliente.destroy', 'id' => $cliente->id])
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
@stop
