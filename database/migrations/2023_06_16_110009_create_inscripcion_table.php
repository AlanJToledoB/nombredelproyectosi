<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionTable extends Migration
{
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumnos_id')->constrained('alumnos');
            $table->foreignId('materias_id')->constrained('materias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
}