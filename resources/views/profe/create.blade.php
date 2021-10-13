@extends('layouts.plantilla')
@section('content')
<div class="container col-md-8" style="margin-top:4%">
    <div class="card">
        <div class="card-body">
            <h1>Evaluacion de Alumnos</h1>
            @if (isset($_GET['ok']))
                <div class="alert alert-info" role="alert">
                    Dato guardado correctamente.
                </div>
            @elseif(isset($_GET['error']))
                <div class="alert alert-warning" role="alert">
                    Debe calificar al menos a un alumno.
                </div>
            @endif
            <form action="" method="GET">

            <select class="form-select" name="cuatri" aria-label="Default select example">
                <option selected value="0">Selecciona una materia</option>
                @foreach ($profeMateria as $mat)
                    <option value={{$mat->idMateria}}>{{$mat->materia}}</option>
                @endforeach
    
              </select>
              <button style="margin-top:2%" type="submit" class="btn btn-success" name="buscar" value="si">Buscar</button>
            </form>
        </div>{{-- Fin del cardBody --}}
    </div>{{-- Fin del Card --}}
</div> {{-- Fin del container --}}

<div class="container col-md-8" style="margin-top:4%">
    <div class="card">
        <div class="card-body">
            <form action="{{route('docente.store')}}" method="post">
                @csrf
            <table class="table table-stiped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Calificacion</th>
                        <th>Calificadas</th>
                    </tr>
                </thead>
    
                <tbody>
                    @if (!empty($alumno[0]))
                    
                    @foreach ($alumno as $alu)
                    <tr>
                        <th>{{$alu->name}}</th>
                        <th>
                            <input type="hidden" name="id[]" value="{{$alu->id}}">
                            <input type="text" name="calif[]">
                            <input type="hidden" name="cuatri" value="{{$_GET['cuatri']}}">
    
                        </th>
                        <th> <label for="">{{$alu->calif}}</label></th>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <button style="margin-top:2% type="submit" class="btn btn-success">Enviar</button>
            </form>
        </div>{{-- Fin del cardBody --}}
    </div>{{-- Fin del Card --}}
</div>

@stop
