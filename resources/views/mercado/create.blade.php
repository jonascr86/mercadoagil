<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Mercado</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Mercado</h1>
            <form method = 'get' action = '{{url("mercado")}}'>
                <button class = 'btn btn-danger'>Mercado Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("mercado")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="razao_social">razao_social</label>
                    <input id="razao_social" name = "razao_social" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="nome_fantasia">nome_fantasia</label>
                    <input id="nome_fantasia" name = "nome_fantasia" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="ativo">ativo</label>
                    <input id="ativo" name = "ativo" type="text" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label>enderecos Select</label>
                    <select name = 'endereco_id' class = 'form-control'>
                        @foreach($enderecos as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class = 'btn btn-primary' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
