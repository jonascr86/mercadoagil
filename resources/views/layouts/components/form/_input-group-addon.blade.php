<div class="form-group{{ $errors->first($name, ' has-error') }}">
    {!! Form::label($name, $label, ['class' => 'control-label']) !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="{{ $icon }}"></i>
        </div>
        {{ $input }}
    </div>
    {!! $errors->first($name, '<p class="help-block">:message</p>') !!}
</div>
