<?php

use Illuminate\Database\Seeder;
use App\Pregunta;


class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tiene algo que ver con esto";
        $pregunta->opciones = 1;
        $pregunta->id_texto = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "No Tiene algo que ver con esto";
        $pregunta->opciones = 1;
        $pregunta->id_texto = 1;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tienes telefono movil";
        $pregunta->opciones = 1;
        $pregunta->id_texto = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tienes covid-19";
        $pregunta->opciones = 1;
        $pregunta->id_texto = 2;
        $pregunta->save();

        $pregunta = new Pregunta();
        $pregunta->pregunta = "Tienes hambre";
        $pregunta->opciones = 1;
        $pregunta->id_texto = 3;
        $pregunta->save();



    }
}
