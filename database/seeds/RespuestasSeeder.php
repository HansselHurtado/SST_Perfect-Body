<?php

use Illuminate\Database\Seeder;
use App\Respuesta;


class RespuestasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->id_pregunta = 1;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->id_pregunta = 1;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->id_pregunta = 2;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->id_pregunta = 2;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->id_pregunta = 3;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->id_pregunta = 3;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->id_pregunta = 4;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->id_pregunta = 4;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "No";
        $respuesta->id_pregunta = 5;
        $respuesta->save();

        $respuesta = new Respuesta();
        $respuesta->respuesta = "Sí";
        $respuesta->id_pregunta = 5;
        $respuesta->save();

    }
}
