<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('visita_conferencia');
            $table->string('fecha_solicitud');
            $table->string('carrera');
            $table->string('grupo');
            $table->string('num_alumnos');
            $table->string('prof_solicitante');
            $table->string('materia');
            $table->string('nom_empresa');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('fecha_act');
            $table->string('objetivos_g');
            $table->string('objetivos_e');
            $table->string('asesor_r');
            $table->string('estado');
            //$table->bigInteger('user_id');
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
        Schema::dropIfExists('solicituds');
    }
}
