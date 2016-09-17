<div class="radio">
    <label>
        {!! Form::radio($name, $value, $checked, array_merge(['class' => 'square-blue'], $attributes)) !!}
        <label class="mar-5">{{ $text }}</label>
    </label>
</div>
