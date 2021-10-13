@extends ('layouts.plantilla')
@section('content')

<div class="container col-md-11" style="margin-top: 3%">
<div class="card">
    <div class="card-body">
        <h1>Asignar permisos</h1>

        {{-- Creacion de un card header y un form para buscar --}}
        <div class="card-header">
            <form action="" method="get" class="row g-3">
                <div class="col-auto">
                    <input type="text" class="form-control" name="dato" placeholder="Buscar Usuario">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-success" name="buscar" value="si">Buscar</button>
                </div>
            </form>
        </div>{{-- Fin del card-header --}}

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $usr)
                    <tr>
                        <th>{{$usr->id}}</th>
                        <th>{{$usr->name}}</th>
                        <th class="text-break">{{$usr->email}}</th>
                        <th width="10px">
                            <a class="btn btn-success" href="{{route('users.edit', $usr->id)}}">Asignar rol</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>{{-- Fin del cardBody --}}
</div>{{-- Fin del Card --}}
</div>

@stop