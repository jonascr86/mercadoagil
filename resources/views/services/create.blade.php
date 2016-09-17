@extends('layouts/default')

@section('title', "Criar serviço {$serviceType->description}")

@section('content')
    <div class="row">
        {!! Form::open(['route' => ['service.store', request()->route('id')], 'method' => 'POST']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-create')
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Form::myCheckbox('uses_credential', null, 'Habilitar credenciais') !!}
                            {!! Form::textBox('description', null) !!}
                        </div>
                    </div>
                    <div class="row">
                        @include('layouts/dynamic-fields/fields', ['fields' => $serviceType->fields])
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
