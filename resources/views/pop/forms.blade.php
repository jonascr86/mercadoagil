<div class="row">
    <div class="col-xs-6">
        {{ Form::textBox('descricao', null, 'Descrição') }}
    </div>
    <div class="col-xs-6">
        <div class="form-group"></div>
        <div class="form-group">
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalEquipamentos" data-placement="top" title="Adicionar Equipamento ao Pop">
                  Adicionar Equipamentos
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <table class="table" id="table-equipamentos">
        <thead>
            <tr class="filters">
                <th>Descrição</th>
                <th>Tipo de Equipamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ( !empty($equipamentosAdicionados) ) 
                @foreach ($equipamentosAdicionados as $key => $popEq)
                    <tr>
                        <td>
                            <input class="equipamento" name="equipamento[]" id="{{ $key }}" type="hidden" value="{{ $popEq->id_equipamento }}"></input>
                            {{ $popEq->equipamento->observation }}
                        </td>
                        <td>{{ $popEq->equipamento->equipmentType->name }}</td>
                        <td>
                            <a href="#" onclick="removeEquipamento(this)"><i class="fa fa-fw fa-times text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEquipamentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Adicionar Equipamentos</h4>
            </div>
            <div class="modal-body">
                {!! Form::combobox('idTipoEquipamento', ['' => '-- Selecione --'] + $tipoEquipamento->toArray(), null, 'Tipo de Equipamento', ['onchange' => 'atualizarEquipamentos(this.value)']) !!}
                <div id="combo-equipamentos" style="display: none;">
                    {!! Form::combobox('idEquipamentos', [], null, 'Equipamento') !!}
                    <div class="eq-err error"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="return adicionaEquipamentos()" class="btn btn-success">Adicionar</button>
            </div>
        </div>
    </div>
</div>

@section('footer_scripts')
<script>
(function($) {
    adicionaEquipamentos = function() {
        var equipamentoId = $('#idEquipamentos').val();
        
        // checagem vazio
        if ( equipamentoId==null || equipamentoId=='' ) {
            return false;
        }

        // checagem repetidos
        encontrou = false;
        
        $('.equipamento').each( function() {
            if ( this.value == equipamentoId ) {
                $('.eq-err').html('Esse equipamento já foi adicionado!');
                encontrou = true;
            }
        });
        
        if ( encontrou ) {
            return false;
        }

        //
        var newRow = $("<tr>");
        var cols = "";

        var rowNumber = $(this).parent('tr').prevAll().length;

        cols += '<td><input class="equipamento" name="equipamento[]" id="'+rowNumber+'" type="hidden" value="'+ $('#idEquipamentos').val() + '"></input>' + $( "#idEquipamentos option:selected" ).text() +'</td>';
        cols += '<td>'+ $( "#idTipoEquipamento option:selected" ).text() + '</td>';
        cols += '<td><a href="#" onclick="removeEquipamento(this)"><i class="fa fa-fw fa-times text-danger"></i></a></td>';

        newRow.append(cols);
        $("#table-equipamentos").append(newRow);

        $("#closeModal").click();

        return true;
  };
  
   removeEquipamento = function(handler) {
    var tr = $(handler).closest('tr');

    tr.fadeOut(400, function(){ 
      tr.remove(); 
    }); 

    return false;
  };
  
  
  atualizarEquipamentos = function(tipo) {
        $.ajax({
            type: "GET",
            url : "{{ route('listar.equipamentos', null) }}/" + tipo,
            success : function(data){
                options = $('#idEquipamentos');
                options.find('option').remove().end().append( $("<option />").val('').text( '-- Selecione --' ) );
                
                for (var key in data) {
                    options.append($("<option />").val(key).text( data[key] ));
                }
                
                $('#combo-equipamentos').css('display', 'block');
            }
        },"json");
  };
  
})(jQuery);
</script>
@stop