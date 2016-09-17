@include('layouts.components.form._input-group-addon', ['input' => Form::email($name, $value, array_merge(['class' => 'form-control'], $attributes)), 'icon' => 'fa fa-fw fa-envelope'])
