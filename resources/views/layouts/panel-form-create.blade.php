<div class="btn-group pull-right" role="group">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> @lang('button.save')</button>
    <a href="{!! URL::to(str_replace('{id}', Route::input('id'), str_replace('create', '', Route::getCurrentRoute()->getPath()))) !!}" class="btn btn-default"><i class="fa fa-undo"></i> @lang('button.back')</a>
</div>