<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

use App\Models\User;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['dato']) && !empty($_GET['dato']) && $_GET['buscar'] == 'si') {
            $users = \DB::table('users') ->select('id', 'name', 'email')
            ->where('name', 'LIKE', '%'.trim($_GET['dato']).'%')
            ->orWhere('email', 'LIKE', '%'.trim($_GET['dato']).'%') 
            ->orWhere('id', 'LIKE', '%'.trim($_GET['dato']).'%')
            ->get();    
        } else {
            
            //Consulta la tabla usuarios en mi DB
            //Mostrar los usuarios a asignar
            $users = \DB::table('users')->select('id', 'name', 'email')->get();
            // dump($usuarios);
        }

        
        return view('admin.users.index', compact('users'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //Mostrar el usuario
        //Mostrar los permisos

        $roles = Role::all();
        $usr = \DB::table('users')
        ->select('id', 'name')
        ->where('id', '=', $id)
        ->first();


        return view('admin.users.edit', compact('roles', 'usr'));


        //dump($roles, $usr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        //dump($request->rollId, $id);
        $user->roles()->sync($request->rolId);
        return redirect()->route('users.edit', $user)
        ->with('info', 'Se asignó correctamente el rol');
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
