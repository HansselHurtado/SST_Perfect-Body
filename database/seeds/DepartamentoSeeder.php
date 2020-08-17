<?php

use Illuminate\Database\Seeder;
use App\departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = new departamento();
        $departamento->departamento = "Tecnologia";
        $departamento->save();

        $departamento = new departamento();
        $departamento->departamento = "Facturacion";
        $departamento->save();

        $departamento = new departamento();
        $departamento->departamento = "Administrativo";
        $departamento->save();

        $departamento = new departamento();
        $departamento->departamento = "Asistencial";
        $departamento->save();

        $departamento = new departamento();
        $departamento->departamento = "Admisiones";
        $departamento->save();
    }
}
