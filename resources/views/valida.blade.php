@extends('layouts.plantilla')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Valida</title>
</head>
<body>
    <h1>Bienvenido a la validacion de datos</h1>
    

    <p>El usuario es: {{$usuario->name}}</p>
    <p>Fue creado el: {{$usuario->created_at}}</p>


    @stop
</body>
</html>