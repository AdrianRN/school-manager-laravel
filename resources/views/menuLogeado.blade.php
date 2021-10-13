@extends ('layouts.plantilla')

@section('content')

<div class="" style="margin-top:4%;">
    <h3 class="h2" style="font-size: 50px;"><i class="fas fa-address-card"></i> Bienvenido: {{$user->name}}</h3>
</div>

@can('alumno.materias')
<table style="margin-top: 3%" class="table table-striped">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Cuatrimestre</th>
            <th>Calificación</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($materias as $m)
            <tr>
                <th>{{$m->materia}}</th>
                <th>{{$m->cuatri}}</th>
                <th>{{$m->calif}}</th>
            </tr>
        @endforeach
    </tbody>
</table>
@endcan




@stop