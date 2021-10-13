{{-- Modificaciones al codigo, pega el codigo en un bloc de notas --}}

@extends('layouts.plantilla')
@section('content')

<div class="row">
    <div class="col-sm-12">

        <h2 class="text-center" style="margin-top:4%; margin-bottom:4%">Asignar materias <span style="color: #34883B; text-decoration: underline;">alumno:</span></h2>
        <div class="card" style="margin-top: 4%">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        <tbody>
                            {{-- Recorrer la variables alumnos --}}
                            @foreach ($alumnos as $alu)
                            <tr>
                                <th>{{$alu->id}}</th>
                                <th>{{$alu->name}}</th>
                                <th class="text-break">{{$alu->email}}</th>
                                <th width="10px">
                                    <a href="{{route('admin.edit', $alu->id)}}" class="btn btn-success">Asignar</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div> {{-- fon del cardyBody --}}
            <div class="card-foooter">
                {{$alumnos->links()}}
          </div>
        </div> {{-- Fin del card --}}
    </div>
</div>



@stop