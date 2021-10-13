<!-- Blade es el manejador de plantillas -->
@extends('layouts.plantilla')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Laravel</title>

</head>
<body>
    <div class="container m-0 row justify-content-center">
      
      <h1 style="margin-top: 2%; margin-bottom: 2%; text-align: center">UTLag</h1>
        
      <p>Este es un prototipo de una aplicación web que sirve como gestor escolar para profesores, estudiantes y administradores. Una vez que entras, dependiendo del tipo de usuario que eres, tienes una rama de acciones disponibles para llevar a acabo. Hay tres tipos de usuarios para esta aplicación.
      </p>

        

        <hr>
        

        <div class="card mb-3 mt-3" style="max-width: 540px;">
            <div class="row g-0" style="display: flex;
            align-items: center;">
              <div class="col-md-4">
                <img src="https://icons.iconarchive.com/icons/webalys/kameleon.pics/512/Student-3-icon.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title" style="display:inline-block; position: abosulte; top:100px;">Estudiante</h5>
                  <p class="card-text"></p>
                  <p class="text-justify">Ver las materias que se te han asignado y realizar un seguimiento de tus calificaciones.</p>
                  <p class="text-justify">En caso de no tener cuenta, deberás solicitar tu correo y contraseña con la administración.</p>
                
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3 mt-3" style="max-width: 540px;">
            <div class="row g-0" style="display: flex;
            align-items: center;">
              <div class="col-md-4">
                <img src="https://icons.iconarchive.com/icons/webalys/kameleon.pics/512/Boss-3-icon.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Profesor</h5>
                  <p class="card-text"></p>
                  <p class="text-justify">Ver las materias que tiene asignadas para enseñar, a la par que tiene acceso a calificar y editar calificaciones de sus estudiantes.</p>
                  <p class="text-justify">En caso de no tener asignaturas asignadas, no poder acceder a sus asignaturas o a las calificaciones de sus alumnos, deberá solicitar asistencia técnica a la administración.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3 mt-3" style="max-width: 540px;">
            <div class="row g-0" style="display: flex;
            align-items: center;">
              <div class="col-md-4">
                <img src="https://icons.iconarchive.com/icons/webalys/kameleon.pics/512/Key-icon.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Administrador</h5>
                  <p class="card-text"></p>
                  <p class="text-justify">Registrar nuevos usuarios dentro del gestor y administrar los roles y permisos para determinar qué acciones puede hacer cada usuario.</p>
                  <p class="text-justify">Encargado de asignar materias a profesores (para impartir) y a estudiantes (para cursar).</p>
                </div>
              </div>
            </div>
          </div>
        




    </div>

    <hr>



    <div class="container row m-0 row justify-content-center" style="margin-top:2%";>
      <h2 class="text-center">¡Pruébalo tú mismo!</h2>

    <div class="card text-white bg-dark mb-3" style="max-width: 18rem; margin: 1%;">
      <div class="card-header text-center" style="font-weight: bold">Estudiante</div>
      <div class="card-body">
        <p class="card-text" style="font-weight: bold"><i class="fas fa-envelope"></i> estudiante@ejemplo.com</p>
        <p class="card-text" style="font-weight: bold"><i class="fas fa-key"></i> estuadiante123</p>
      </div>
    </div>

    <div class="card text-white bg-warning mb-3" style="max-width: 18rem; margin: 1%;">
      <div class="card-header text-center" style="font-weight: bold">Profesor</div>
      <div class="card-body">
        <p class="card-text" style="font-weight: bold"><i class="fas fa-envelope"></i> profesor@ejemplo.com</p>
        <p class="card-text" style="font-weight: bold"><i class="fas fa-key"></i> profesor123</p>
      </div>
    </div>

    <div class="card text-white bg-info mb-3" style="max-width: 18rem; margin: 1%;">
      <div class="card-header text-center" style="font-weight: bold">Administrador</div>
      <div class="card-body">
        <p class="card-text" style="font-weight: bold"><i class="fas fa-envelope"></i> admin@utlag.edu.mx</p>
        <p class="card-text" style="font-weight: bold"><i class="fas fa-key"></i> admin</p>
      </div>
    </div>
    </div>
    




        {{-- Para @section('content') --}}
        @stop
    </div>
</body>
</html>