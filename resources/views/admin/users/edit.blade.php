@extends('layouts.plantilla')
@section('content')


<div class="card">
    <h1>Mostrar roles</h1>
    @if (session('info'))
        <div class="alert alert-success" role="alert">
            {{session('info')}}
        </div>
    @endif

    <div class="card-header">
        Usuario: {{$usr->name}}
    </div>

    <div class="card-body">
        <form action="{{route('users.update', $usr->id)}}" method="post">
            @csrf
            @method('PUT')

            @foreach ($roles as $rol)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="rolId[]" value="{{$rol->id}}">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{$rol->name}}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Asignar rol</button>

        </form>
    </div>
</div>

@stop