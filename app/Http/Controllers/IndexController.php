<?php

namespace App\Http\Controllers;
use App\departamento;
use App\Personal;
use App\Texto;
use App\Respuesta;
use App\Registro;
use App\Pregunta;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index_administracion','crear_texto','editar_texto','eliminar_texto');
    }

    public function index(){
        $departamentos = departamento::all();
        $personals = Personal::orderBy('nombre')->get();
        $textos = Texto::all(); 
        return view('home2',compact('departamentos','textos','personals'));
    }

    public function index_administracion(){        
        $textos = Texto::all();        
        $personals = DB::table('personals')
                        ->join('departamentos','personals.id_departamento','departamentos.id_departamento')
                        ->select('personals.id_personal','personals.nombre','personals.cedula',
                                'departamentos.departamento as nombre_departamento')->paginate(5);               
        return view('administracion',compact('personals','textos'));
    }

    public function registrar_personal(Request $request){
        $personal = new Personal();
        $personal->nombre = $request->nombre;
        $personal->cedula = $request->cedula;
        $personal->id_departamento = $request->departamento;
        $personal->save();
        return redirect()->back();
    }

    public function textos($id_texto){
        return $texto = Texto::with(array('pregunta'=> function($respuesta){
            $respuesta->join('respuestas','preguntas.id_pregunta','respuestas.id_pregunta');
            $respuesta->select('preguntas.id_pregunta','preguntas.pregunta','preguntas.id_texto','respuestas.id_pregunta','respuestas.id_respuesta','respuestas.respuesta as res');
        }))->where('id_texto',$id_texto)->get(); 
    }

    public function guardar_encuesta(Request $request){
        for ($i=2; $i<=$request->variable; $i++){
            $registro_encuesta = new Registro;
            $registro_encuesta->id_personal = $request->nombre;
            $registro_encuesta->id_texto = $request->texto;
            $registro_encuesta->id_pregunta = $request->input("pregunta$i");
            $registro_encuesta->id_respuesta = $request->input("respuesta$i");
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $registro_encuesta->fecha = $date;
            $registro_encuesta->save();
        }
        return redirect()->back();  
    }

    public function crear_texto(Request $request){
        $texto = new Texto;
        $texto->titulo = $request->titulo;
        $texto->texto = $request->texto;
        $texto->save();
        return redirect()->back();  
    }

    public function editar_texto(Request $request){
       // return $request;
        $texto = Texto::findOrFail($request->id_texto);
        $texto->titulo = $request->titulo;
        $texto->texto = $request->texto;
        $texto->save();
        for ($i=1; $i<=$request->variable; $i++){
            $pregunta = Pregunta::findOrFail($request->input("id_pregunta$i"));
            if($pregunta != null){
                $pregunta->pregunta = $request->input("pregunta$i");
                $pregunta->id_texto = $request->id_texto;
                $pregunta->save();               
            }else{
                $pregunta_nueva = new Pregunta;
                $pregunta_nueva->pregunta = $request->input("pregunta$i");
                $pregunta_nueva->id_texto = $request->id_texto;               
                $pregunta_nueva->save();
            }
        }
        return redirect()->back();  
    }

    public function eliminar_texto($id_texto){
        $texto = Texto::findOrFail($id_texto);
        $texto->delete();
        return redirect()->back(); 
    }
}
