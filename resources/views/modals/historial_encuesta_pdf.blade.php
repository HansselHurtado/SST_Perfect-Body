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
    <h3>Historial encuesta de <strong class="text-primary">{{$nombre}}</strong></h3>
    <span> del {{$date}}</span>
    @foreach ($registros as $registro)
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <h6 class="text-uppercase text-left">{{$registro->titulo}}</h6> 
                    </th>
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <thead >
                <tr>
                    <th scope="col">
                        <h6 class="text-uppercase ">Pregunta </h6> 
                    </th>
                    <th scope="col">
                        <h6 class="text-uppercase ">Respuesta</h6> 
                    </th>
                </tr>
            </thead>    
            <tbody>
                @foreach($registro->registro_pregunta_respuesta as $pregunta_respuesta)
                    <tr>                
                        <td>{{$pregunta_respuesta->pregunta}}</td>   
                        <td>{{$pregunta_respuesta->respuesta}}</td>                 
                    <tr>            
                @endforeach        
            </tbody>
        </table>
    @endforeach
    
</body>
</html>

