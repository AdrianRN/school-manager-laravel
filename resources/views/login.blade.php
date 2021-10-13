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
    <div class="container col-md-6 mt-4">
        <h1 class="text-center">Ingresar</h1>

    <form action="/valida" method="post">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>    
            @endforeach

        @endif

        {{-- Token necesario para seguridad --}}
        @csrf
        <p>
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" name="email">
        </p>

        <p>
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password">
        </p>


        {{-- Captha --}}
        <p>
            <div class="mb-3 text-center">
                <span class="captcha">
                    {!!captcha_img()!!}
                </span>

                <button id="reload" class="btn btn-warning fa fa-redo"></button>
            </div>
            <div class="mb-3">
                <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Ingresa el captcha">
            </div>
        </p>
        

        <p>
            <button type="submit" class="btn btn-success">Enviar</button>
        </p>
    </form>
    </div>
    



    {{-- Para el @section('content') --}}
    @stop
</body>
</html>