<div class="row">
    <div class="col-xs-6">
        {!! Form::textBoxAddon('first_name', null, 'fa fa-fw  fa-user', 'Nome') !!}
        {!! Form::textBoxAddon('last_name', null, 'fa fa-fw  fa-user', 'Sobrenome') !!}
    </div>
    <div class="col-xs-6">
        {!! Form::passwordAddon('password', 'Senha') !!}
        {!! Form::passwordAddon('password_confirm', 'Confirmação de senha') !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        {!! Form::emailAddon('email') !!}
        {!! Form::combobox('group', $roles, null, 'Grupo') !!}
        {!! Form::myCheckbox('activate', 1, 'Ativar usuário', 1) !!}
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="http://placehold.it/200x150" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                    <span class="btn btn-primary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="pic" id="pic" />
                    </span>
                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>
