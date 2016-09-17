@extends('layouts/list')

@section('title', 'Gerenciar grupos')

@section('button-create', route('user.group.create'))

@section('panel-body')
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>@lang('groups/table.id')</th>
                <th>@lang('groups/table.name')</th>
                <th>@lang('groups/table.users')</th>
                <th>@lang('groups/table.created_at')</th>
                <th>@lang('groups/table.actions')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->users()->count() }}</td>
                    <td>{{ $role->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('user.group.edit', $role->id) }}">
                            <i class="fa fa-fw fa-pencil text-warning"></i>
                        </a>
                        @if ($role->id != 1)
                            @if($role->users()->count())
                                <a href="#" data-toggle="modal" data-target="#users_exists" data-name="{!! $role->name !!}" class="users_exists">
                                    <i class="fa fa-fw fa-info text-warning"></i>
                                </a>
                            @else
                                <a href="{{ route('user.group.destroy', $role->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                <i class="fa fa-fw fa-times text-danger"></i>
                                </a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
