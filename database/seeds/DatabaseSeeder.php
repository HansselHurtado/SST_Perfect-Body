<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(TextosSeeder::class);
        $this->call(PreguntasSeeder::class);
        $this->call(RespuestasSeeder::class);
    }
}
