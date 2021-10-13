<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// llamar a los usuarios
use App\Models\User;
//hacer operaciones con la base de datos
use Illuminate\Support\Facades\DB;//para poder ejecutar consultas a la base de datos
use Illuminate\Support\Facades\Hash;//para crear una encriptacion del password

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //Llamar al seeder para generar los datos en la base de datos de los permisos y roles
        $this->call(RolSeeder::class);

        
        //Creacion de un super usuario ADMIN
        User::create([
            'name' => 'admin',
            'email' => 'admin@utlag.edu.mx',
            'password' => Hash::make('admin')

        ])->assignRole('admin');


        // \App\Models\User::factory(10)->create();
        //Array de materias y arreglo de cuatrimestre
        User::factory(10)->create();
        $materias = array("Diseño web profesional", "Bases de datos", "Aplicaciones web 4.0", "Diseño digital");
        $cuatri = array(8, 8, 5, 5);
        $timestamp = now();

        foreach( $materias as $key => $mat){
            DB::table('materias')->insert([
                'materia'=>$mat,
                'cuatri'=>$cuatri[$key],
                'created_at'=>$timestamp ,
                'updated_at'=>$timestamp
            ]);
        }//Fin del foreach

        


    }
}
