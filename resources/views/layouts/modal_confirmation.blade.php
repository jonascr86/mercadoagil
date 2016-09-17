<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="user_delete_confirm_title">
      @if(isset($title))
        {{ $title }}
      @else
        @lang($model.'/modal.title')
      @endif
  </h4>
</div>
<div class="modal-body">
    @if($error)
        <div>{!! $error !!}</div>
    @elseif(isset($body))
        {{ $body }}
    @else
        @lang($model.'/modal.body')
    @endif
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">
        @if(isset($msg_cancel))
            {{ $msg_cancel }}
        @else
            @lang($model.'/modal.cancel')
        @endif
  </button>
  @if(!$error)
    <a href="{{ $confirm_route }}" type="button" class="btn btn-danger">
      @if(isset($msg_ok))
        {{ $msg_ok }}
      @else
        @lang($model.'/modal.confirm')
      @endif
    </a>
  @endif
</div>