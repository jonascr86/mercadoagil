@extends('layouts/default')

@section('title', 'Criar pool')

@section('content')
    <div class="row">
        {!! Form::open(['route' => 'pool.store']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-create')
                </div>
                <div class="panel-body">
                    @include('pool/partial/forms')                    
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
