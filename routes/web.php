<?php

use Illuminate\Support\Facades\Route;

// Mandar llamar al controlador calificaciones
use App\Http\Controllers\controllerCalificaciones;

use App\Http\Controllers\adminController;

use App\Http\Controllers\profeController;

use App\Http\Controllers\usersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Manejo de las vistas
// Route::get('/', function () {
    
//     return view('index');
// });

// Route::get('5appWeb', function () {
//     // Definiar variables como normalmente sería en PHP
//     $nom = "Adrian";
//     $mats = array("Diseño Web", "Base de datos", "Programacion MVC");
//     $calif = 8;
//     $num = 1;

//     // Paso de parametros a la vista Hola utilizando el "with"
//     return view('hola')
//     ->with('nom', $nom)
//     ->with('mats', $mats)
//     ->with('calif', $calif)
//     ->with('num', $num);
// });

// Route::get('log', function () {
//     return view('login');
// });


//Manejo de las vistas utilizando controlador
//                                            nombre del metodo
//Rutas Controller calificaciones
Route::get('/', [controllerCalificaciones::class, 'index'])->name('index');

Route::get('/5appWeb', [controllerCalificaciones::class, 'app5tos'])->name('calif');

//Get porque solo entraremos a la vista
Route::get('/login', [controllerCalificaciones::class, 'login'])->name('login')->middleware('guest');

// Post porque es el que valida
Route::post('/valida', [controllerCalificaciones::class, 'validacion']);

// Ojo: Esta ruta la va a manejar adminController
// Route::get('/registro', [controllerCalificaciones::class, 'registro'])->name('registro');

Route::post('/guardar', [controllerCalificaciones::class, 'guardar'])->name('guardar');

Route::get('/menu', [controllerCalificaciones::class, 'menulog'])->name('menu')->middleware('auth');

Route::get('/logout', [controllerCalificaciones::class, 'logout'])->name('logout');

Route::get('/materias', [controllerCalificaciones::class, 'materias'])->name('materias');




//Rutas adminController
Route::resource('/admin', adminController::class);

//Rutas profeController
Route::resource('/docente', profeController::class)->only('index', 'edit', 'update', 'create', 'store')->middleware('can:docente.calificar.materias');



//Rutas usersController
Route::resource('/users', usersController::class)->middleware('can:admin.asignar.permisos');