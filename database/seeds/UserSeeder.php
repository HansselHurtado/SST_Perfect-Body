<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();//creamos un nuevo usuario de tipo admin
        $user->name = "Super Admin";
        $user->user_name = "Admin";
    	$user->email = "Admin@email.com";
		$user->password = bcrypt('perfect');//aqui incriptamos la contraseña
		$user->save();

		$user = new User();//creamos un nuevo usuario
        $user->name = "User normal";
        $user->user_name = "User";
    	$user->email = "user@email.com";
		$user->password = bcrypt('perfect');//aqui incriptamos la contraseña
		$user->save();
    }
}
