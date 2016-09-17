@extends('layouts/default')

@section('title', 'Editar grupo')

@section('content')
    <div class="row">
        {!! Form::model($role, ['route' => ['user.group.update', $role->id], 'method' => 'PUT']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-edit')
                </div>
                <div class="panel-body">
                    <div class="col-xs-6">
                        @include('users/groups.forms')
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
