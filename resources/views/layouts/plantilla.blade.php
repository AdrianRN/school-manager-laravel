{{-- Plantilla Bootstrap --}}
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/e95c899a1b.js" crossorigin="anonymous"></script>

    <title>UTLag</title>
  </head>
  <body>
    @section('header')
    {{-- Aqui va un menu --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">UTLag</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('index')}}">Inicio</a>
            </li>

            @guest

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('login')}}">Ingresar</a>
            </li>
            
            @else
            {{-- modificacion para mostrar el alumno y sus calificaciones --}}
            {{-- DropDownList --}}

            @can('alumno.materias')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Alumno {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('menu')}}">Calificaciones</a></li>
              </ul>
            </li>
            @endcan


            @can('admin.asignar.permisos')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @can('admin.ingresar.usuario')
                <li><a class="dropdown-item" href="{{route('admin.index')}}"><i class="fas fa-user-plus"></i> Nuevo usuario</a></li>
                @endcan

                @can('admin.asignar.materias.alumno')
                <li><a class="dropdown-item" href="{{route('admin.create')}}">Asignar materias Alumno</a></li>
                @endcan

                @can('admin.asignar.profesores')
                <li><a class="dropdown-item" href="{{route('docente.index')}}">Asignar materias a profesor</a></li>
                <li><a class="dropdown-item" href="{{route('materias')}}">Materias del año</a></li>
                @endcan

                @can('admin.asignar.permisos')
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('users.index')}}">Asignar permisos</a></li>
                @endcan
              </ul>
            </li>
            @endcan


            @can('docente.calificar.materias')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profesor: {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('docente.create')}}">Calificar</a></li>
                
              </ul>
            </li>
            @endcan


            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Salir</a>
            </li>

            @endguest

          </ul>
        </div>
      </div>
    </nav>

    @show


    <div class="container">
      @section('content')

      @show
    </div>




    @section('footer')
    <footer class="pt-4" style="margin-top: 5%">

      <!-- Copyright -->
      <div class="d-flex justify-content-center text-center text-dark p-3" style="font-weight: bold; background-color: rgba(36, 36, 36, 0.2);">
        © Jesús Adrián Rebeles Nava 2021
      </div>
      <!-- Copyright -->

    </footer>
    @show


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>