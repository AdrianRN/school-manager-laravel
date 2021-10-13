<!-- Blade es el manejador de plantillas -->
@extends('layouts.plantilla')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- Esta es una referencia antigua --}}
    {{-- <h1>Hola Mundo desde Laravel!</h1>

    <h3>El nombre es: {{$nom}}</h3>

    @if ($calif >= 8)
        <p>El alumno acreditó la materia!</p>

    @else
        <p>El alumno NO acreditó la materia</p>        
    @endif

    {{-- Con esta funcion mostramos el contenido de la variable
    @dump($mats);
    --}}
    {{-- <hr>
    <p>Esto es un Foreach</p>
    @foreach ($mats as $mat)
        <h4>La materia es: {{$mat}}</h4>

    @endforeach
    <hr>
    <p>Esto es un While</p>
    @while ($num <=3)
        <p>El numero es: {{$num++}}</p>
    @endwhile --}}

    <ol>
        @foreach ($data as $d)
            <li>{{$d->email}}---{{$d->name}}</li>
        @endforeach
        
    </ol>


    {{-- Para el @section('content') --}}
    @stop
    
    






    


    @section('footer')
    <a href="{{route('index')}}">Regresar</a>
    @stop

    
    
</body>
</html>