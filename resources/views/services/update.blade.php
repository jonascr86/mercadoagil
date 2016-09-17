@extends('layouts/default')

@section('title', 'Atualizar serviço')

@section('content')
    <div class="row">
        {!! Form::model($registro, ['route' => ['servico.update', $registro->id], 'method' => 'PUT']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h4 class="pull-left">@yield('title')</h4>
                    @include('layouts.panel-form-edit')
                </div>
                <div class="panel-body">
                    <div class="col-xs-6">
                        {{ Form::textBox('descricao', null, 'Descrição') }}
                        {{ Form::combobox('id_tipo_servico', $tiposServico, null, 'Selecione um tipo') }}
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#campos-dinamicos"><i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar campo dinâmico</a>
                        <div id="fields">
                            <!-- erro validacao -->
                            <div class="error">{{ $errors->first('fields') }}</div>
                            <!-- /erro validacao -->
                            
                            <!-- carrega fields da base -->
                            @foreach ( $fields as $key => $field )
                            <div class="form-group">
                                <label class="label-control">{{ $field->label }}</label>
<!--                                <input type="text" class="form-control" name="" value="{{ $field->descricao }}">-->
                                <a href="#" class="remove-form-group">Remover</a>
                                <input type="hidden" class="form-control" name="dinamico[{{ $field->label }}]" value="{!! http_build_query($field->toArray()) !!}">
                            </div>
                            @endforeach
                            <!-- /fim carregamento fields da base -->
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    @include('equipamentos.dinamico.partial.modal')
    
@stop
