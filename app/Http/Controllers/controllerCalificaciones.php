<?php

namespace App\Http\Controllers;
// Libreria para DB
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
// Para el manejo de validacion en Laravel
use Illuminate\Support\Facades\Auth;



class controllerCalificaciones extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('menulog', 'materias');
    }



    // En el control, va la logica
    
    // Retornar la vista index
    public function index() {
        return view ('index');
    }

    public function app5tos() {
        // Como se hacia antes sin bases de datos

        // $nom = "Adrian";
        // $mats = array("Diseño Web", "Base de datos", "Programacion MVC");
        // $calif = 8;
        // $num = 1;
        //     return view ('hola')
        //     ->with('nom', $nom)
        //     ->with('mats', $mats)
        //     ->with('calif', $calif)
        //     ->with('num', $num);


        //Eloquent - Modelo de Control
        // select * from users;
        $data = \DB::table('users')->get();
        

        // // Similar a @dump()
        // dd($data);
        // die();
        return view('alumnos', compact('data'));
    }

    public function login() {
        return view ('login');
    }


    // si la contraseña no esta encriptada, NO va a entrar
    // Contraseña por defecto de usuarios creados con Tinker = password
    public function validacion(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');


        // validacion de Captcha
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);


        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            
            $usuario = \DB::table('users')
            ->where('email', '=', $email)
            ->first();
            
            //verificar que realmente este regresando
           //dd($usuario->id);
            //crear sessions
            
            session(['id' => $usuario->id]);
         
                       //crear un session y enviarla 
                       //menug log me apunta a la view menuLogeado
           
         return redirect(route('menu'));
             //Con esto verificamos que el usuario existiera
            //die("Usuario logeado!!");
          
        }else{
            //die("Usuario no no existente!!");
            //Si el usuario no existe redirigelo al login
            return redirect(route('login'));
        }
        
        // dump($credentials);
        // die();

        // echo $nombre;
        // echo "<br>";
        // echo $password;
        // die();





        // Forma antigua de validar sin el AUTH
        // if ($usuario) {
        //     return view('valida', compact('usuario'));
        // } else {
        //     die("Usuario o contraseña Incorrecta!");
        // }

        //NOTA: Con esto validamos que si nos esta regresando parametros
        // dd($usuario);
        // die();


        //Select * from users where( email = $email AND password = $password )


        // Manera anterior de trabajarlo:
        
        // return view ('valida')
        // ->with('nombre', $nombre)
        // ->with('password', $password);
    }


    /* Se bloquean estas funciones para poderlas usar en el otro controlador 'adminController'
        public function registro(){
        
        
        return view('registro');
    }
    */


    public function guardar(Request $request){
        
    }



    public function menulog(Request $request) {
        //Llamar a la session de
        $id = session('id');
        //Llamar al usuario
        //dd($id);
        $user = \DB::table('users')->where('id', '=', $id)->first();
        //Mostramos al usuario
        //dd($user);

        $materias = \DB::table('materias')
        ->join('alumnomateria', 'alumnomateria.idMateria', '=', 'materias.id')
        ->where('alumnomateria.idAlumno', '=', $user->id)->get();
        //mostramos materias del usuario
        //dump($materias);
        return view('menuLogeado', compact('materias', 'user'));
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }


    public function materias() {
        //Esto es un select
        //select * from materias
        $materias = \DB::table('materias')->get();

        return view('materias', compact('materias'));
    }




}