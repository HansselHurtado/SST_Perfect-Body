<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('administracion');
    }

    public function registroNuevo(Request $request)
    {    
        if(!$this->validar_user($request->email,$request->user_name)){
            $user = new User();
            $user->name = $request->name;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back();
        }
        return "nombre de usuario o correo electronico ya han sido registrados";
    }

    public function validar_user($email,$user_name){
        $users = User::all();
        foreach ($users as $user){
            if($user->email == $email || $user->user_name == $user_name){
                return true;
            }
        }
        return false;
    }
}
