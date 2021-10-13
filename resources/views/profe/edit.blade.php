@extends('layouts.plantilla')
@section('content')

<div class="container">
    <div class="card">
        <h1>Asignacion de materias: {{$users->name}}</h1>
        <div class="card-body">
            <form action="" method="get">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $m)
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$m->id}}" name="idMat[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="defaultCheck1">
                                      {{$m->materia}}
                                    </label>
                                </div>
                            </th>
                            <th>{{$m->cuatri}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" value="si" name="guardar">Guardar</button>
            </form>
        </div> {{-- Fin del cardBody --}}
    </div>{{-- Fin del Card --}}

    <hr>

    <div class="card">
        <h1>Materias a impartir:</h1>
        <div class="card-body">
            <form action="" method="get">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Cuatrimestre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profe as $m)
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$m->id}}" name="idMat[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="defaultCheck1">
                                      {{$m->materia}}
                                    </label>
                                </div>
                            </th>
                            <th>{{$m->cuatri}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger" value="si" name="eliminar">Eliminar</button>
            </form>
        </div> {{-- Fin del cardBody --}}
    </div>{{-- Fin del Card --}}
</div>

@stop