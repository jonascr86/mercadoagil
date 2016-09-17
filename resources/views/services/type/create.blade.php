@extends('layouts/default')

@section('title', 'Criar tipo de serviço')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'service.type.store']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-create')
                </div>
                <div class="panel-body">
                    @include('services/type/partials/forms')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
