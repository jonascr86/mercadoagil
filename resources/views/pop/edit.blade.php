@extends('layouts/default')

@section('title', 'Editar pop')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($model, ['route' => ['pop.update', $model->id], 'method' => 'PUT']) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h4 class="pull-left">@yield('title')</h4>
                        @include('layouts.panel-form-edit')
                    </div>
                    <div class="panel-body">
                            @include('pop.forms')
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
