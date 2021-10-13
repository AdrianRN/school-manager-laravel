@extends ("layouts.plantilla")
@section ("content")
<h2 style="margin-top: 3%">Materias del año:</h2>


<table style="margin-top: 3%" class="table table-striped">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Cuatrimestre</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($materias as $materia)
            <tr>
                <th>{{$materia->materia}}</th>
                <th>{{$materia->cuatri}}</th>
            </tr>
        @endforeach
    </tbody>
</table>

</div>{{-- Fin del cardBody --}}
</div>{{-- Fin del Card --}}

@stop