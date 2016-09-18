<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Mercado</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Mercado</h1>
            <br>
            <form method = 'get' action = '{{url("mercado")}}'>
                <button class = 'btn btn-primary'>Mercado Index</button>
            </form>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>razao_social : </i></b>
                        </td>
                        <td>{{$mercado->razao_social}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>nome_fantasia : </i></b>
                        </td>
                        <td>{{$mercado->nome_fantasia}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>ativo : </i></b>
                        </td>
                        <td>{{$mercado->ativo}}</td>
                    </tr>
                    

                                                
                        
                        <tr>
                        <td>
                            <b><i>rua : </i><b>
                        </td>
                        <td>{{$mercado->endereco->rua}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>numero : </i><b>
                        </td>
                        <td>{{$mercado->endereco->numero}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>cep : </i><b>
                        </td>
                        <td>{{$mercado->endereco->cep}}</td>
                        </tr>
                        
                        
                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
