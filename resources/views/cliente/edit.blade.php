@extends('layouts/default')

@section('title', 'Editar cliente')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($model, ['route' => ['cadastro.cliente.update', $model->id], 'method' => 'PUT']) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">@yield('title')</h4>
                        @include('layouts.panel-form-edit')
                    </div>
                    <div class="panel-body">
                        @include('cliente.forms')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
