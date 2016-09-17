<div class="form-group {{ $errors->first($name, 'has-error') }}">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    {!! Form::text($name, $value, array_merge(['class' => 'form-control', 'data-mask', 'data-inputmask' => "'alias': '99999-999'"], $attributes)) !!}
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
