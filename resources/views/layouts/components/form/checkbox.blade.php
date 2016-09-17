<div class="checkbox">
    <label>
        {!! Form::checkbox($name, $value, $checked, array_merge(['class' => 'square-blue'], $attributes)) !!}
        <label class="mar-5">{{ $text }}</label>
    </label>
</div>
