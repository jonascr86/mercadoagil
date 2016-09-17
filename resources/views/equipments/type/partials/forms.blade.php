<div class="col-xs-6">
    {!! Form::combobox('product_id', $products, null, 'Produto') !!}
    {!! Form::combobox('equipment_group_id', $equipmentGroups, null, 'Grupo') !!}
    {!! Form::textBox('name', null, 'Nome') !!}
    {!! Form::myCheckbox('uses_port', 1, 'Habilitar portas', null, ['id' => 'uses_port']) !!}
    <div id="uses-port-extra">
        {!! Form::myCheckbox('rival_ports', 1, 'Usa portas concorrentes', null) !!}
        {!! Form::numeric('num_ports', null, 'Número de portas') !!}
    </div>
</div>

@section('footer_scripts')
    @parent
    <script>
        $(document).ready(function() {

            function usesPortExtra(val) {
                if (val) {
                    $('#uses-port-extra').show();
                }
                else {
                    $('#uses-port-extra').hide();
                }
            }

            usesPortExtra($('#uses_port').is(':checked'));

            $('#uses_port').on('ifChanged', function() {
                usesPortExtra($(this).is(':checked'));
            });
        });
    </script>
@stop
