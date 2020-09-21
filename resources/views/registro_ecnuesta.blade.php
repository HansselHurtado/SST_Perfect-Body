<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/styles.css" rel="stylesheet" />

    <title>Historial de encuesta</title>
</head>
<body>
    <div class="d-flexjustify-content-between">
        <img class="my-1" style="width:180px;" src="assets/img/logo.png" alt=""> 
        <span class="my-0">{{$dat}}</span>
    </div>
    <h4>Historial encuesta de <i>{{$texto->titulo}}<i></h4>
    <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead>
            <tr style="text-align: center;">
                <th>#</th>                                    
                <th>Nombre completo</th>                                    
                <th>Cedula</th>
                <th>Departamento</th>                         
            </tr>
        </thead>
        <tbody id="table_personal">
            @php($i="")      
            @php($j=1)         
            @foreach ($registros as $registro )
                @if($registro->nombre != $i)
                    <tr style="text-align: center;">
                        <th>{{$j}}</th>
                        <th>{{$registro->nombre}}</th>
                        <th>{{$registro->cedula}}</th>
                        <th>{{$registro->nombre_departamento}}</th>                                    
                    </tr> 
                    @php($j++)
                    @php($i = $registro->nombre) 
                @endif                                             
            @endforeach   
        </tbody>
    </table>
</body>
</html>
