@extends('layouts/default')

@section('title', 'Editar tipo de pool')

@section('content')
    <div class="row">
        {!! Form::model($model, ['route' => ['pool.tipo.update', $model->id], 'method' => 'PUT']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-edit')
                </div>
                <div class="panel-body">
                    @include('tipopool/partial/forms')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
