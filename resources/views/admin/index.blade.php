@extends('layouts.plantilla')

@section('content')

<div class="container col-md-5" style="margin-top: 2%">

    <h2 class="text-center" style="margin-top:4%; margin-bottom:4%">Nuevo usuario:</h2>
    
    @if ($registro ?? '' == "si")
        <div class="alert alert-success" role="alert">
            Registro guardado correctamente!
        </div>    
        
    @endif

    <form action="{{route('admin.store')}}" method="post">
        @csrf

        <div class="mb-3" style="margin-top: 4%">
            <label for="name" class="label">Nombre:</label>
            <input type="name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="label">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="label">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>





    </form>
</div>

@stop