<div class="row">
    <div class="col-xs-6">
        {{ Form::textBox('nome', null, 'Nome') }}
    </div>
    <div class="col-xs-6">
        {{ Form::combobox('tipo', $tipos, null, 'Tipo') }}
    </div>
</div>
<div id="divFisica">
    <div class="panel panel-primary">
        <div class="panel-heading">Dados pessoa física</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::cpf('cpf', null) }}
                </div>
                <div class="col-xs-6">
                    {{ Form::textBox('rg', null, 'RG') }}
                </div>
                <div class="col-xs-6">
                    {{ Form::inputDate('data_nascimento', null, 'Data de nascimento') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="divJuridica">
    <div class="panel panel-primary">
        <div class="panel-heading">Dados pessoa jurídica</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::textBox('cnpj', null, 'CNPJ') }}
                </div>
                <div class="col-xs-6">
                    {{ Form::textBox('ie', null, 'IE') }}
                </div>
                <div class="col-xs-6">
                    {{ Form::textBox('nome_fantasia', null, 'Nome fantasia') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="endereco">
    <div class="panel panel-primary">
        <div class="panel-heading">Endereço</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::cep('cep', null) }}
                    {{ Form::combobox('id_cidade', $cidades, null, 'Cidade') }}
                    {{ Form::textBox('endereco', null, 'Endereço') }}
                    {{ Form::textBox('complemento', null, 'Complemento') }}
                </div>
                <div class="col-xs-6">
                    {{ Form::textBox('bairro', null, 'Bairro') }}
                    {{ Form::numeric('numero', null, 'Número') }}
                    {{ Form::textBox('observacao', null, 'Observação') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="contato">
    <div class="panel panel-primary">
        <div class="panel-heading">Contato</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                    {{ Form::phone('telefone', null) }}
                    {{ Form::myEmail('email', null) }}
                    {{ Form::textBoxAddonText('site', null, 'http://', 'Site') }}
                </div>
                <div class="col-xs-6">
                    {{ Form::phone('celular', null, 'Celular') }}
                    {{ Form::myEmail('email_alternativo', null, 'E-mail alternativo') }}
                    {{ Form::myEmail('email_nfe', null, 'E-mail NFE') }}
                </div>
            </div>
        </div>
    </div>
</div>


@section('footer_scripts')
<script>
    (function($) {
        $('#tipo').change(function(){
            check_tipo();
        });

        check_tipo = function() {
            $('#divFisica, #divJuridica').hide();
            if ( $('#tipo').val() == '{{ $tipoFisica }}' ) {
                $('#divFisica').show();
            } else {
                $('#divJuridica').show();
            }
        };

        check_tipo();
    })(jQuery);
</script>
@stop
