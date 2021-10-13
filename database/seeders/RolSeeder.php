<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear los insert en las respectivas bases de datos
        
        //Realizar el insert en la base de datos Roles
        //Creacion de los roles
        $rolAdmin = Role::create(['name'=>'admin']);
        $rolDocente = Role::create(['name'=>'docente']);
        $rolAlumno = Role::create(['name'=>'alumno']);

        //Creacion de los permisos
        Permission::create(['name'=> 'admin.ingresar.usuario'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.ingresar.profesores'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.asignar.profesores'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.asignar.alumnos'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.asignar.materias.alumno'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.asignar.materias.profesor'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'admin.asignar.permisos'])->syncRoles([$rolAdmin]);
        Permission::create(['name'=> 'docente.calificar.materias'])->syncRoles([$rolAdmin,$rolDocente]);
        Permission::create(['name'=> 'alumno.materias'])->syncRoles([$rolAlumno]);

    }
}
