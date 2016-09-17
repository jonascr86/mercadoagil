@if ($errors->any())
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Erro:</strong> Por favor, cheque os erros formulário abaixo
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Sucesso:</strong> {{ Session::get('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Ooops!:</strong> {{ Session::get('error') }}
</div>
@endif

@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Atenção:</strong> {{ Session::get('warning') }}
</div>
@endif

@if (Session::has('info'))
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Info:</strong> {{ Session::get('info') }}
</div>
@endif
