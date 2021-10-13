<?php

namespace App\Http\Controllers;

use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){
        //bloquea solo el index
        $this->middleware('can:admin.ingresar.usuario')->only('index');
        $this->middleware('can:admin.asignar.materias.alumno')->only('create');

    }

    public function index()
    {
        // Regresa la vista registro
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // movimos el create al edit

        //como si fuera un select
        $alumnos = \DB::table('users')->paginate(7);
        return view('admin.create', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // dd($name, $email, $password);
        // die();

        \DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        
        return view('admin.index')->with('registro', 'si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //muevo el codigo de create a edit

        // Asignar materias a los alumnos

        //Para verificar si existe
        if(isset($_GET['cuatri']) && $_GET['cuatri'] !=0) {
            $materias = \DB::table('materias')->where('cuatri', '=', $_GET['cuatri'])->get();
            //dump($materias);
        } else {
            $materias = \DB::table('materias')->get();
        }
        //Sesion que se crea al iniciar
        // $id = session('id');
        //el id ahora lo manda en create  --$id
        
        // hacer la consulta de las materias
        $matAsignadas = \DB::table('materias')
        // segunda tabla       - primer campo a relacionar    - segundo campo a relaciones 
        ->join('alumnomateria', 'alumnomateria.idMateria', '=', 'materias.id')
        ->where('alumnomateria.idAlumno' , '=',  $id)->get();

        if(isset($_GET['cuatri']) && isset($_GET['save']) == "si") {
            $resp = $matAsignadas->where('cuatri', $_GET['cuatri'])->first();
            //dump($resp);

            if(!$resp) {
                //dump("Datos guardados");
                //dump($materias);


                foreach ($materias as $m) {
                    \DB::table('alumnomateria')
                    ->insert([
                        'idAlumno' => $id,
                        'idMateria' => $m->id,
                    ]);
                }

                
            } else {
                //dump("Datos NO guardados");
            }


        }
        
        
        //dump($materias, $id, $matAsignadas);
        //modificamos la vista de create por edit
        return view('admin.edit', compact('matAsignadas', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
