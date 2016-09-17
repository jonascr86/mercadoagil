@extends('layouts/default')

@section('title', 'Editar pool')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($registro, []) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">@yield('title')</h4>
                        @include('layouts.panel-form-edit')
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-6">
                            @include('tipodepool.forms')
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
