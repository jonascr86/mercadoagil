<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Mercado</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Mercado Index</h1>
            <form class = 'col s3' method = 'get' action = '{{url("mercado")}}/create'>
                <button class = 'btn btn-primary' type = 'submit'>Create New Mercado</button>
            </form>
            <br>
            
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Associate
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    
                    <li><a href="http://localhost:8000/endereco">Endereco</a></li>
                    
                </ul>
            </div>
            
            <br>
            <table class = "table table-striped table-bordered">
                <thead>
                    
                    <th>razao_social</th>
                    
                    <th>nome_fantasia</th>
                    
                    <th>ativo</th>
                    
                    
                    
                    
                    <th>rua</th>
                    
                    <th>numero</th>
                    
                    <th>cep</th>
                    
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($mercados as $Mercado)
                    <tr>
                        
                        <td>{{$Mercado->razao_social}}</td>
                        
                        <td>{{$Mercado->nome_fantasia}}</td>
                        
                        <td>{{$Mercado->ativo}}</td>
                        
                        
                        
                                                <td>{{$Mercado->endereco->rua}}</td>

                                                <td>{{$Mercado->endereco->numero}}</td>

                                                <td>{{$Mercado->endereco->cep}}</td>

                        
                        
                        
                        <td>
                                <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/mercado/{{$Mercado->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/mercado/{{$Mercado->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/mercado/{{$Mercado->id}}'><i class = 'material-icons'>info</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
<script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
</html>
