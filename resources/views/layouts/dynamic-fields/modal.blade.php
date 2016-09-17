<div class="modal fade" id="dynamic-field" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar novo campo</h4>
            </div>
            {!! Form::open($formOpen) !!}
            <div class="modal-body">
                {!! Form::textBox('field_label', null, 'Rótulo') !!}
                {!! Form::textBox('field_name', null, 'Nome do campo') !!}
                {!! Form::combobox('field_type_id', $fieldsType, null, 'Tipo') !!}
                <div id="div_pool" style="display: none;">
                    {!! Form::combobox('pool_type_id', $tiposPool, null, 'Tipo de pool') !!}
                    {!! Form::myCheckbox('automatic', 1, 'Automático') !!}
                </div>
                {!! Form::textBox('field_default', null, 'Valor padrão') !!}
                {!! Form::textBox('field_length', null, 'Tamanho') !!}
                {!! Form::myCheckbox('field_required', 1, 'Obrigatório') !!}
                {!! Form::myCheckbox('field_listable', 1, 'Exibir na listagem', 1) !!}
                {!! Form::hidden('type_id', $typeId) !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@section('footer_scripts')
    @parent
    <script>
        (function($) {
            $('#field_type_id').change(function(){
                checkTypePool();
            });

            // trata logica de POOL
            checkTypePool = function(){
                var fieldType = $('#field_type_id').val();
                var display = ( fieldType == {{ \App\FieldType::TYPE_POOL }} ) ? 'block' : 'none';
                $('#div_pool').css('display', display);
            };

            checkTypePool(); // onload. chamar isso no edit
        })(jQuery);

        @if($errors->has())
            $(document).ready(function (){
                $('#dynamic-field').modal();
            });
        @endif
    </script>
@stop
