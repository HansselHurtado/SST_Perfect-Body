<?php

use Illuminate\Database\Seeder;
use App\Personal;


class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personal = new Personal();
        $personal->nombre = "Hanssel Hurtado";
        $personal->id_departamento = 1;
        $personal->cedula = 1212331;
        $personal->save();

        $personal = new Personal();
        $personal->nombre = "Kenedy Charris";
        $personal->id_departamento = 1;
        $personal->cedula = 12133;
        $personal->save();

    }
}
