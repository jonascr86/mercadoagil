@extends('layouts/default')

@section('title', 'Editar usuário')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($user, ['route' => ['users.edit', $user->id]]) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">@yield('title')</h4>
                        @include('layouts.panel-form-edit')
                    </div>
                    <div class="panel-body">
                        @include('users.forms')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
