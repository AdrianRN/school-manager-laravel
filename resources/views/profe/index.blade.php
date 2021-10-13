{{-- Modificaciones al codigo, pega el codigo en un bloc de notas --}}

@extends('layouts.plantilla')
@section('content')

<h2 class="text-center" style="margin-top:4%; margin-bottom:4%">Asignar materias a <span style="color: #34883B; text-decoration: underline;">profesor</span></h2>

<div class="card" style="margin-top: 3%">
    
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
                    @foreach ($profe as $p)
                    <tr>
                        <th>{{$p->id}}</th>
                        <th>{{$p->name}}</th>
                        <th class="text-break">{{$p->email}}</th>
                        <th width="10px">
                            <a href="{{route('docente.edit', $p->id)}}" class="btn btn-success">Asignar</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div> {{-- fon del cardyBody --}}
    <div class="card-foooter">
        {{$profe->links()}}
  </div>
</div> {{-- Fin del card --}}

@stop