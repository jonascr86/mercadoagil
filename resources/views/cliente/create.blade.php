@extends('layouts/default')

@section('title', 'Criar cliente')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => 'cadastro.cliente.store']) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">@yield('title')</h4>
                        @include('layouts.panel-form-create')
                    </div>
                    <div class="panel-body">
                        @include('cliente.forms')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
