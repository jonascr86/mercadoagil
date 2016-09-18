<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Pedido</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Pedido</h1>
            <form method = 'get' action = '{{url("pedido")}}'>
                <button class = 'btn btn-danger'>Pedido Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("pedido")}}/{{$pedido->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="data">data</label>
                    <input id="data" name = "data" type="text" class="form-control" value="{{$pedido->data}}">
                </div>
                
                <div class="form-group">
                    <label for="situacao">situacao</label>
                    <input id="situacao" name = "situacao" type="text" class="form-control" value="{{$pedido->situacao}}">
                </div>
                
                <div class="form-group">
                    <label for="retirar">retirar</label>
                    <input id="retirar" name = "retirar" type="text" class="form-control" value="{{$pedido->retirar}}">
                </div>
                
                
                <div class="form-group">
                    <label>enderecos Select</label>
                    <select name = 'endereco_id' class = "form-control">
                        @foreach($enderecos as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class = 'btn btn-primary' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
