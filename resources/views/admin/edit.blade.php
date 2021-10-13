{{-- Movimos el codigo de create a edit --}}

@extends('layouts.plantilla')

@section('content')

<div class="container col-md-7">
    <div class="card">
        <form method="GET" action="">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text">Selecciona un cuatrimestre</label>
                </div>
            </div>
            <select class="custom-select" name="cuatri" id="">
                <option selected value="0">Selecciona una opcion</option>
                <option value="8">8vo Cuatrimestre</option>
                <option value="5">5to Cuatrimestre</option>
            </select>

            <button type="submit" class="btn btn-success">Buscar</button>
        </form>

        
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <th>Cuatrimestre</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                    @foreach ($materias as $m)
                        <tr>
                            <td>{{$m->cuatri}}</td>
                            <td>{{$m->materia}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div> {{-- Fin del CardBody --}}
    </div> {{-- Fin del card --}}

    <hr>

    <div class="card">
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <th>Cuatrimestre</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                    @foreach ($matAsignadas as $m)
                        <tr>
                            <td>{{$m->cuatri}}</td>
                            <td>{{$m->materia}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> {{-- Fin del container --}}

        <form method="GET" action="">
            @if (isset($_GET['cuatri']))
                <input type="hidden" name="cuatri" value={{$_GET['cuatri']}}>
            @endif
            
            <input type="hidden" name="save" value="si">

            <button type="submit" class="btn btn-secondary">Guardar</button>
        </form>
    </div> {{-- Fin del cardBody --}}

</div> {{-- Fin del container --}}

@stop