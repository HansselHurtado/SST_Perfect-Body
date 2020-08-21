<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\departamento;
use App\Personal;
use Auth;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $personals = DB::table('personals')
                        ->join('departamentos','personals.id_departamento','departamentos.id_departamento')
                        ->select('personals.id_personal','personals.nombre','personals.cedula','departamentos.departamento as nombre_departamento')->paginate(5);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
        
            return view('administracion',compact('personals'));
        }

        return redirect()->route('home2')->with('message4', 'Usuario o Contraseña incorrecta');
    }
    
    /*protected function credentials(Request $request)
    {
        $login = $request->input($this->username());
        // Comprobar si el input coincide con el formato de E-mail
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        return [
            $field => $login,
            'password' => $request->input('password')
        ];
    }

    public function username()
    {
        return 'login';
    }
*/
    public function logout(){
        Auth::logout();
        return redirect()->route('home2');
    }   
    
}
