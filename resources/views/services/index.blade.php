@extends('layouts/list')

@section('title', 'Gerenciar equipamentos')

@section('button-create', route('service.create', request()->route('id')))

@section('panel-body')
    <h3>{{ $serviceType->description }}</h3>
    <table class="table" id="table">
        <thead>
            <tr class="filters">
                <th>#</th>
                <th>Descrição</th>
                @foreach($serviceType->fields as $field)
                    @if($field->listable)
                    <th>{{ $field->name }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->description }}</td>
            @foreach($service->contents as $content)
                @if($content->field->listable)
                <td>{{ $content->value }}</td>
                @endif
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
