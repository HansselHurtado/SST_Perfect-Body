<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPreguntaRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_pregunta_respuestas', function (Blueprint $table) {
            $table->increments('id_registro_pregunta_respuestas');

            $table->unsignedInteger('id_registro');
            $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');

            $table->string('pregunta');
            $table->string('respuesta');
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
        Schema::dropIfExists('registro_pregunta_respuestas');
    }
}
