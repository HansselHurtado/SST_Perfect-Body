<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id_registro');

            $table->unsignedInteger('id_personal');
            $table->foreign('id_personal')->references('id_personal')->on('personals')->onDelete('cascade');
            
            $table->unsignedInteger('id_texto');
            $table->foreign('id_texto')->references('id_texto')->on('textos')->onDelete('cascade');

            $table->string('fecha');
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
        Schema::dropIfExists('registros');
    }
}
