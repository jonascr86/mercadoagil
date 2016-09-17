<div class="btn-group pull-right" role="group">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> @lang('button.update')</button>
    <a href="{!! URL::to(preg_replace('/\/\{(.*)\}\/edit/', '', Route::getCurrentRoute()->getPath())) !!}" onclick="" class="btn btn-default"><i class="fa fa-undo"></i> @lang('button.back')</a>
</div>