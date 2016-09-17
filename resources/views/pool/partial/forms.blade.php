<div class="row">
    <div class="col-xs-6">
        {{ Form::combobox('id_tipo_pool', $tiposPool, null, 'Selecione um tipo de pool') }}
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        {{ Form::myTextArea('pools', null, 'Pools') }}
    </div>
</div>
