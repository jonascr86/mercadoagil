<div class="form-group {{ $errors->first($nome, 'has-error') }}">
    @if ( $automatico )
        {!! Form::text($nome, $poolAleatorio, array_merge(['class' => 'form-control'], $attributes = ['readonly' => 1])) !!}
    @else
        {!! Form::combobox($nome, $tiposDePool, null, 'Pool') !!}
    @endif
    {!! $errors->first($nome, '<p class="help-block">:message</p>') !!}
</div>
{{-- Variaveis definidas em ViewComposerProvider.php --}}
{{-- USO: Form::pool(1, 'pool', true) --}}