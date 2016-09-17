@extends('layouts/list')

@section('title', 'Gerenciar usuários')

@section('button-create', route('users.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>Nome</th>
                <th>E-mail</th>
                <th>Status</th>
                <th>Criado em </th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($activation = Activation::completed($user))
                            Ativo
                        @else
                            Pendente
                        @endif
                    </td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        @if(!$user->trashed())
                            <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-fw fa-pencil text-warning"></i></a>
                            @if((Sentinel::getUser()->id != $user->id) && ($user->id != 1))
                                <a href="{{ route('confirm-delete/user', $user->id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-fw fa-times text-danger"></i></a>
                            @endif
                            <a href="{{ route('users.show', $user->id) }}"><i class="fa fa-fw fa-star text-primary"></i></a>
                        @else
                            <a href="{{ route('restore/user', $user->id) }}"><i class="fa fa-fw fa-undo text-danger"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
