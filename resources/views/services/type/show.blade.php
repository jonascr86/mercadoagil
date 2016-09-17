@extends('layouts/default')

@section('title', 'Novo tipo de equipamento')

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">{{ $serviceType->description }}</h4>
                <div class="btn-group pull-right" role="group">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#dynamic-field">Adicionar novo campo</a>
                </div>
            </div>
            <div class="panel-body">
                @forelse($serviceType->fields as $field)
                    <div class="col-xs-4">
                        {!! Form::textBoxAddon('demo_' . $field->id, $field->default, 'fa fa-trash-o', $field->label, ['disabled']) !!}
                    </div>
                @empty
                    <div class="alert alert-warning">Nenhum campo foi criado para esse tipo e equipamento.</div>
                @endforelse
            </div>
        </div>
    </div>
    @include('layouts/dynamic-fields/modal', [
        'formOpen' => ['route' => 'service.type.dynamic-field'],
        'typeId' => request()->route('type')
    ])
@stop

@section('footer_scripts')
    <script>
        @if($errors->has())
            $('#dynamic-field').modal();
        @endif
    </script>
@stop
