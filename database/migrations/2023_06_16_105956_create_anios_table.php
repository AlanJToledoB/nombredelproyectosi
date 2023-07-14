<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAniosTable extends Migration
{
    public function up()
    {
        Schema::create('anios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_anio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anios');
    }
}
