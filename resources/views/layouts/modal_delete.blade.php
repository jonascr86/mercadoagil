<?php
// fiz isso para concluir a tarefa de exclusao de registros,
// sei que pode consumir muito HTML nas listagens
// se alguem tiver uma ideia melhor fique a vontade
?>
<!-- modal EXCLUIR -->
<div class="modal fade" id="modal-delete-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="user_delete_confirm_title">
              Confirmação de exclusão
          </h4>
        </div>
        <div class="modal-body">
            Tem certeza que deseja excluir o registro?
        </div>
        <div class="modal-footer">
            {{ Form::open(['route' => [$route, $id], 'method' => 'DELETE']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancela</button>
                <button type="submit" class="btn btn-danger">Confirma</button>
            {{ Form::close() }}
        </div>
    </div>
</div>
<!-- botao EXCLUIR para listagem -->
<a href="" data-toggle="modal" data-target="#modal-delete-{{ $id }}">
    <i class="fa fa-fw fa-times text-danger"></i>
</a>
