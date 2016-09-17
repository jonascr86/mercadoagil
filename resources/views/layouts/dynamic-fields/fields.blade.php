<div class="col-xs-6">
@foreach($fields as $field)
    <div class="form-group">
    @if($field->type->name == 'varchar')
        {!! Form::textBox("dynamics[{$field->id}]", $field->default, $field->label, ($field->required ? ['required'] : []) + ($field->length ? ['max' => $field->length] : [])) !!}
    @elseif($field->type->name == 'pool')
        {!! Form::pool($field->pool_type_id, "dynamics[{$field->id}]", $field->automatic) !!}
    @endif
    </div>
@endforeach
</div>