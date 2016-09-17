@extends('layouts/default')

@section('title', 'Editar tipo de serviço')

@section('content')
    <div class="row">
        {!! Form::model($serviceType, ['route' => ['service.type.update', $serviceType->id], 'method' => 'PUT']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-edit')
                </div>
                <div class="panel-body">
                    @include('services/type/partials/forms')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
