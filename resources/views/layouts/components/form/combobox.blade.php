<div class="form-group {{ $errors->first($name, 'has-error') }}">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    {!! Form::select($name, $list, $selected, array_merge(['class' => 'form-control select2', 'style' => 'width: 100%'], $attributes)) !!}
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
