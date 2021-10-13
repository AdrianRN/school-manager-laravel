<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnoMateria', function (Blueprint $table) {
            //Crear los datos de la tabla de relacion
            $table->id();
            $table->foreignId('idAlumno')->constrained('users'); // id(user) ==(id)idAlumno
            $table->foreignId('idMateria')->constrained('materias'); // id(materias) == id(idmateria)
            $table->char('letra', 5)->nullable(); // nos permite que tenga valores null
            $table->float('calif')->nullable();// Porque no siempre van a tener calificacion
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnoMateria', function (Blueprint $table) {
            //Eliminar la tabla
            Schema::drop("alumnoMateria");
        });
    }
}
