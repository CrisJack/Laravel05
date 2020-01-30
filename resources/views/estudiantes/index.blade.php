<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Hola Mundo Laravel</h1>
    <?php
    //foreach ($students as $value) {
        //echo $value['nombre']."<br/>";
       // echo $value->nombre."<br/>";
   // } 
    ?>

    <table class= "table">
        <thead>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fotos</th>
        <th>Acciones</th>
        </thead>
       
        <tbody>
            @foreach($students as $value)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->nombre}}</td>
                <td>{{$value['apellido']}}</td>
                <td><img src="{{asset('storage').'/'.$value['foto']}}" width=100></td>
                <td><a class="btn" href="{{url('/estudiantes/'.$value['id'].'/edit')}}">Editar</a>      
                
                
                
                
                <form action="{{url('/estudiantes/'.$value['id'])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estas Seguro de querer Borrar?')">Borrar</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>