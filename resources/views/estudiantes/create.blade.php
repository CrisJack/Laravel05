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
<div class="container">
<div class="row">
<div class="col">
<h1>Pagina para crear Estudiantes</h1>
<form action="{{url('/estudiantes')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    Nombre: <input class=" m-2" type="text" name="nombre"><br>
    Apellido: <input class=" m-2" type="text" name="apellido"><br>
    Foto: <input class=" m-2" type="file" name="foto"><br>
    <input class="btn btn-primary" type="submit" value="enviar datos">
</form>
</div>
</div>
</div>


</body>
</html>