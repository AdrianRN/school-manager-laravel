<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProfeMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profeMateria', function (Blueprint $table) {
            //Crear la realacion entre materias a impartir y profesor
            $table->id();
            $table->foreignId('idProfe')->constrained('users');
            $table->foreignId('idMateria')->constrained('materias');
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
        Schema::table('profeMateria', function (Blueprint $table) {
            //
            Schema::drop('profeMateria');
        });
    }
}
