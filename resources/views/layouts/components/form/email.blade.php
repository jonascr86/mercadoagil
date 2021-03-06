<div class="form-group {{ $errors->first($name, 'has-error') }}">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    {!! Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
