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
        $this->middleware('auth')->only('index_administracion','crear_texto','editar_texto','eliminar_texto','eliminar_pregunta');
    }

    public function index(){
        $departamentos = departamento::all();
        $personals = Personal::orderBy('nombre')->get();
        $textos = Texto::all(); 
        return view('home2',compact('departamentos','textos','personals'));
    }

    public function index_administracion(){        
        $textos = Texto::all();        
        $preguntas = Pregunta::where('opciones',1)->get();        
        $personals = DB::table('personals')
                        ->join('departamentos','personals.id_departamento','departamentos.id_departamento')
                        ->select('personals.id_personal','personals.nombre','personals.cedula',
                                'departamentos.departamento as nombre_departamento')->paginate(5);               
        return view('administracion',compact('personals','textos','preguntas'));
    }

    public function registrar_personal(Request $request){
       $personals = Personal::where('cedula',$request->cedula)->first();
       if($personals == null){
            $personal = new Personal();
            $personal->nombre = $request->nombre;
            $personal->cedula = $request->cedula;
            $personal->id_departamento = $request->departamento;
            $personal->save();
        }else{
            return ('este numero de cedula ya existe');
        }
        return redirect()->back();
    }

    public function textos($id_texto){
        return $texto = Texto::with(array('pregunta'=> function($respuesta){
            $respuesta->join('respuestas','preguntas.id_pregunta','respuestas.id_pregunta');
            $respuesta->select('preguntas.id_pregunta','preguntas.pregunta','preguntas.id_texto','preguntas.opciones','respuestas.id_pregunta','respuestas.id_respuesta','respuestas.respuesta as res');
        }))->where('id_texto',$id_texto)->get(); 
    }
    
    public function editar_textos($id_texto){
        return $texto = Texto::with(array('pregunta'))->where('id_texto',$id_texto)->get(); 
    }

    public function guardar_encuesta(Request $request){        
       $personal = Personal::where('id_personal',$request->nombre)->where('cedula',$request->cedula)->first();
       if($personal != null){
            for ($i=2; $i<=$request->variable; $i++){
                $registro_encuesta = new Registro;
                $registro_encuesta->id_personal = $request->nombre;
                $registro_encuesta->id_texto = $request->texto;
                $registro_encuesta->id_pregunta = $request->input("pregunta$i");
                $registro_encuesta->respuesta = $request->input("respuesta$i");
                $date = Carbon::now();
                $date = $date->format('Y-m-d');
                $registro_encuesta->fecha = $date;
                $registro_encuesta->save();
            }
            return redirect()->back();  
        }else{
            alert()->error('Notificación de Error');
            return ('numero de cedula invalido');  
        }        
    }

    public function crear_texto(Request $request){
        $texto = new Texto;
        $texto->titulo = $request->titulo;
        $texto->texto = $request->texto;
        $texto->save();
        return redirect()->back();  
    }

    public function editar_texto(Request $request){
        $texto = Texto::findOrFail($request->id_texto);
        $texto->titulo = $request->titulo;
        $texto->texto = $request->texto;
        $texto->save();
        for ($i=1; $i<=$request->variable; $i++){
            if($request->input("id_pregunta$i") != null){
                $pregunta = Pregunta::findOrFail($request->input("id_pregunta$i"));
                $pregunta->pregunta = $request->input("pregunta$i");
                $pregunta->id_texto = $request->id_texto;
                $pregunta->save();          
            }else{
                $pregunta_nueva = new Pregunta();
                $pregunta_nueva->pregunta = $request->input("pregunta$i");
                $pregunta_nueva->id_texto = $request->id_texto; 
                $pregunta_nueva->opciones = $request->input("opciones$i");              
                $pregunta_nueva->save();
                $respuesta = new Respuesta();
                $respuesta->opciones = $request->input("opciones$i");
                $respuesta->id_pregunta = $pregunta_nueva->id_pregunta;
                $respuesta->save();
            }
        }
        return redirect()->back();  
    }

    public function eliminar_texto($id_texto){
        $texto = Texto::findOrFail($id_texto);
        $texto->delete();
        return redirect()->back(); 
    }

    public function eliminar_pregunta($id_pregunta){
        $pregunta = Pregunta::findOrFail($id_pregunta);
        $pregunta->delete();
        return redirect()->back();
    }

    public function anadir_respuesta(Request $request){
        $j=1;
        $respuestaa = Respuesta::where('id_pregunta',$request->pregunta)->first();
        if($respuestaa->respuesta == null){
            $respuestaa->respuesta = $request->input("respuesta1");
            $respuestaa->save();
            $j++;
        }
        for ($i=$j; $i<=$request->variable; $i++){
            $respuesta = new Respuesta();
            $respuesta->respuesta = $request->input("respuesta$i");
            $respuesta->id_pregunta = $request->pregunta;
            $respuesta->opciones = 1;
            $respuesta->save();
        }
        return redirect()->back(); 
    }
}
