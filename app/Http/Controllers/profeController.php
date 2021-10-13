<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class profeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        //bloquea solo el index
        $this->middleware('can:docente.calificar.materias')->only('index');
        $this->middleware('can:docente.calificar.materias')->only('create');


    }


    public function index()
    {
        //mostrar los usuarios a asignar
        $profe = \DB::table('users')->paginate(7);
        return view('profe.index', compact('profe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // El store para guardar a los usuarios
        // Manejo de sesion para saber quien es el docente

        //llamar a la sesion
        $id = session('id');

        $profeMateria = \DB::table('materias')
        ->join('profemateria', 'profemateria.idMateria', '=', 'materias.id')
        ->where('profemateria.idProfe', '=', $id)
        ->get();
        //dump($profeMateria);

        if(isset($_GET['cuatri']) && $_GET['cuatri'] !=0 && $_GET['buscar'] == "si") {
            $alumno = \DB::table('alumnomateria')
            ->join('users', 'alumnomateria.idAlumno', '=', 'users.id')
            ->where('alumnomateria.idMateria', '=', $_GET['cuatri'])
            ->get();
        } else {
            $alumno[0] = 0;
        }

        //dump($alumno);

        return view('profe.create', compact('profeMateria' ,'alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //el store es para guardar los usuarios
        //dump($request->calif, $request->id, $request->cuatri);

        $id = $request->input('id');
        $calif = $request->input('calif');
        $cuatri = $request->input('cuatri');

        //isset - valida que tenga parametro
        //array_filter - verifica que no esté vacío el array
        //array filter se puede modificar para que en este caso sea diferente de nulo
        if(isset($cuatri) && array_filter($calif) != []) {
            //el key es como un autoincrementador y va de... 0 1 2 3 4 ... n
            foreach ($id as $key => $val) {
                //valida que la calificacion no venga en blanco
                if($calif[$key] != null) {
                    \DB::table('alumnomateria')
                    ->where('idMateria', '=', $cuatri)
                    ->where('idAlumno', '=', $val)
                    ->update(['calif' => $calif[$key]]);

                }//fin del calif[key]
            }//fin del foreach
            return redirect()->route('docente.create', 'ok');
        }//fin del isset($cuatri)
        return redirect()->route('docente.create', 'error');
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
        //Mostrar las materias que se pueden asignar
        $materias = \DB::table('materias')->get();
        $users = \DB::table('users')->where('id', '=', $id)->first();

        //Devuelve las materias que va a impartir el maestro
        $profe = \DB::table('materias')
        ->join('profemateria', 'profemateria.idMateria', '=', 'materias.id')
        ->where('profemateria.idProfe', '=', $id)->get();
        //dump($materias, $users, $profe);

        if(isset($_GET['guardar']) && $_GET['guardar'] == 'si' && !empty($_GET['idMat'])) {
            //dump("Guardado");
            
            foreach ($_GET['idMat'] as $materia) {
                //Buscar arreglo que me regresa el join
                $resp = $profe->where('idMateria', $materia)->first();

                if(!$resp) {
                    \DB::table('profemateria')->insert([
                        'idProfe' => $id,
                        'idMateria' => $materia,
                    ]);
                } // finalizacion de la validacion de la busqueda colecciones

            }// Fin del foreach
        } // Fin del isset



        if( isset($_GET['eliminar']) && $_GET['eliminar'] =="si" && !empty($_GET['idMat'])){
            // dump('Eliminó');
            foreach ($_GET['idMat'] as $materia) {
                \DB::table('profemateria')
                ->where('id', '=', $materia)
                ->delete();

            } //Fin del foreach
        } //Fin del if isset


        return view('profe.edit', compact('materias', 'users', 'profe'));
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
