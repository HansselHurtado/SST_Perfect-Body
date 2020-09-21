<?php

namespace App\Http\Controllers;
use App\departamento;
use App\Personal;
use App\Texto;
use App\Respuesta;
use App\Registro;
use App\Pregunta;
use App\Registro_pregunta_respuesta;
use Carbon\Carbon;
use DB;
use \ PDF ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('index_administracion','crear_texto','editar_texto','eliminar_texto','eliminar_pregunta','guardar_pdf','eliminar_personal');
    }

    public function index(){
        $departamentos = departamento::all();
        $personals = Personal::orderBy('nombre')->get();
        $textos = Texto::where('estado',1)->get(); 
        return view('home2',compact('departamentos','textos','personals'));
    }

    public function index_administracion(){    
        $date = Carbon::now();
        $date = $date->format('Y-m-d'); 
        $textos = Texto::all(); 

        $departamentos = departamento::all();
        $preguntas = Pregunta::where('opciones',1)->orderBy('id_pregunta','desc')->get();
        $registros= Registro::join('personals','registros.id_personal','personals.id_personal')
                            ->join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                            ->select('registros.id_registro','registros.id_personal','registros.id_texto','registros.fecha',
                                    'personals.nombre as nombre','personals.cedula as cedula'
                                    ,'departamentos.departamento as nombre_departamento')                                           
                            ->where('fecha',$date)->orderBy('personals.nombre')->get();

        //trae todos los registro que tiene un usuario pasandole como paramero el id del usuario y la fecha                                    
        $registro_encuesta = Registro_pregunta_respuesta::where('id_registro',2)->get();   
        $personals = Personal::join('departamentos','personals.id_departamento','departamentos.id_departamento')
                            ->select('personals.id_personal','personals.nombre','personals.cedula',
                                'departamentos.departamento as nombre_departamento')->orderBy('personals.nombre')->paginate(10);               
        return view('administracion',compact('personals','textos','preguntas','registros','departamentos','date'));
    }

    public function registrar_personal(Request $request){
       $personals = Personal::where('cedula',$request->cedula)->first();
       if($personals == null){
            $personal = new Personal();
            $personal->nombre = $request->nombre;
            $personal->cedula = $request->cedula;
            $personal->id_departamento = $request->departamento;
            $personal->save();
            alert()->success('Todo ha salido bien','Usuario registrado corerectamente');
        }else{
            alert()->warning('Usuario ya existe',' Este Usuario ya se encuentra registrado')->persistent('Close');
        }
        return redirect()->back();
    }

    public function texto_personal($date, $id_texto){
        return Registro::join('personals','registros.id_personal','personals.id_personal')
                            ->join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                            ->select('registros.id_registro','registros.id_personal','registros.id_texto','registros.fecha',
                                    'personals.nombre as nombre','personals.cedula as cedula'
                                    ,'departamentos.departamento as nombre_departamento')                                           
                                    ->where('id_texto',$id_texto)->where('fecha',$date)->orderBy('personals.nombre')->get();
    }
    public function texto_personal_solo_texto($id_texto){
        return Registro::join('personals','registros.id_personal','personals.id_personal')
                            ->join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                            ->select('registros.id_registro','registros.id_personal','registros.id_texto','registros.fecha',
                                    'personals.nombre as nombre','personals.cedula as cedula'
                                    ,'departamentos.departamento as nombre_departamento')                                           
                                    ->where('id_texto',$id_texto)->orderBy('personals.nombre')->get();
    }
    public function texto_personal_solo_fecha($date){
        return Registro::join('personals','registros.id_personal','personals.id_personal')
                            ->join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                            ->select('registros.id_registro','registros.id_personal','registros.id_texto','registros.fecha',
                                    'personals.nombre as nombre','personals.cedula as cedula'
                                    ,'departamentos.departamento as nombre_departamento')                                           
                            ->where('fecha',$date)->orderBy('personals.nombre')->get();
    }

    public function textos($id_texto){
        return Texto::with(array('pregunta'=> function($respuesta){
            $respuesta->join('respuestas','preguntas.id_pregunta','respuestas.id_pregunta');
            $respuesta->select('preguntas.id_pregunta','preguntas.pregunta','preguntas.id_texto','preguntas.opciones','respuestas.id_pregunta','respuestas.id_respuesta','respuestas.respuesta as res');
        }))->where('id_texto',$id_texto)->get(); 
    }
    
    public function editar_textos($id_texto){
        return Texto::with(array('pregunta' => function($q){
            $q->join('respuestas','preguntas.id_pregunta','respuestas.id_pregunta');
        }))->where('id_texto',$id_texto)->get();
    }

    public function texto_con_preguntas($id_texto){
        return Pregunta::where('id_texto',$id_texto)->where('opciones', 1)->get();
    }
    
    public function preguntas_respuestas($date, $id_personal){        
        return Registro::with('registro_pregunta_respuesta')
                            ->join('textos','registros.id_texto','textos.id_texto')
                            ->where('id_personal',$id_personal)->where('fecha',$date)->get();
    }
    public function preguntas_respuestas_x_titulo($date, $id_personal,$id_texto){        
        return Registro::with('registro_pregunta_respuesta')
                            ->join('textos','registros.id_texto','textos.id_texto')
                            ->where('id_personal',$id_personal)->where('fecha',$date)->where('id_texto',$id_texto)->get();
    }

    public function personal($cedula){
        return Personal::where('cedula', $cedula)->get();         
    }

    public function guardar_encuesta(Request $request){        
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        $registro_buscar = Registro::where('id_personal',$request->id_personal)->where('id_texto',$request->texto)->where('fecha',$date)->first();
        if($registro_buscar == null){
            $registro_encuesta = new Registro;
            $registro_encuesta->id_personal = $request->id_personal;
            $registro_encuesta->id_texto = $request->texto;            
            $registro_encuesta->fecha = $date;
            $registro_encuesta->save();
            for ($i=2; $i<=$request->variable; $i++){
                $registro_pregunta_respuesta = new Registro_pregunta_respuesta();               
                $registro_pregunta_respuesta->id_registro = $registro_encuesta->id_registro;
                $registro_pregunta_respuesta->pregunta = $request->input("pregunta$i");
                $registro_pregunta_respuesta->respuesta = $request->input("respuesta$i");
                $registro_pregunta_respuesta->save();
            }
            alert()->success('Encuesta realizada','Encuesta realizada correctamente');
        }else{
            alert()->error('Error de evaluacion','Ya hay una encuesta realizada por usted el dia de hoy')->persistent('Close');
        }
        return redirect()->back();            
    }

    public function crear_departamento(Request $request){        
        if(!$this->validar_departamento($request->departamento)){
            $departamento = new departamento();
            $departamento->departamento = $request->departamento;
            $departamento->save();
            return redirect()->back();
        }
        alert()->error('Ya existe un departamento','Este departamento ya existe');
        return redirect()->back();
    }

    public function crear_texto(Request $request){
        if(!$this->validar_texto($request->titulo)){
            $texto = new Texto;
            $texto->titulo = $request->titulo;
            $texto->texto = $request->texto;
            $texto->enlace = $request->enlace;
            $texto->estado = $request->mostrar_texto;
            $texto->nombre_enlace = $request->nombre_enlace;
            if($request->hasFile("foto")){  
                $file = $request->file("foto");               
                $name = time().$file->getClientOriginalName();
                $texto->foto = $name;
                $file->move(public_path().'/images/foto_infografias/', $name);                
            } 
            $texto->save();
        }else{
            alert()->error('Ya existe un texto con este titulo','Este titulo ya existe');
            return redirect()->back();  
        }  
        alert()->success('Todo ha salido bien','Texto creado correctamente');
        return redirect()->back();  
    }

    public function editar_texto(Request $request){
        $texto = Texto::findOrFail($request->id_texto);
        $texto->titulo = $request->titulo;
        $texto->enlace = $request->enlace;
        $texto->nombre_enlace = $request->nombre_enlace;
        $texto->texto = $request->texto;
        $texto->estado = $request->mostrar_texto_editar;
        if($request->hasFile("foto")){  
            $file = $request->file("foto");               
            $name = time().$file->getClientOriginalName();
            $texto->foto = $name;
            $file->move(public_path().'/images/foto_infografias/', $name);                
        }
        $texto->save();
        for ($i=1; $i<=$request->variable; $i++){
            if($request->input("id_pregunta$i") != null){
                $pregunta = Pregunta::findOrFail($request->input("id_pregunta$i"));
                $pregunta->pregunta = $request->input("pregunta$i");
                $pregunta->id_texto = $request->id_texto;
                $pregunta->save();          
            }else{
                if(!$this->validar_pregunta($request->input("pregunta$i"),$request->id_texto)){
                    $pregunta_nueva = new Pregunta();
                    $pregunta_nueva->pregunta = $request->input("pregunta$i");
                    $pregunta_nueva->id_texto = $request->id_texto; 
                    $pregunta_nueva->opciones = $request->input("opciones$i");              
                    $pregunta_nueva->save();
                    $respuesta = new Respuesta();
                    $respuesta->opciones = $request->input("opciones$i");
                    $respuesta->id_pregunta = $pregunta_nueva->id_pregunta;
                    $respuesta->save();
                }else{
                    alert()->error('Las preguntas iguales no se guardan','Hubieron preguntas iguales');
                }  
            }          
        }
        return redirect()->back();  
    }

    public function editar_personal(Request $request){
        $personal = Personal::findOrFail($request->id_personal);
        $personal->nombre = $request->nombre;
        $personal->cedula = $request->cedula;
        $personal->id_departamento = $request->departamento;
        $personal->save();
        alert()->success('Todo ha salido bien','Edicion exitosa');
        return redirect()->back(); 
    }

    public function editar_personal_api($id_personal){
        $personal = Personal::join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                        ->where('id_personal',$id_personal)->first();
        $departamentos = departamento::all();
        return response()->json(array("personal" => $personal,"departamentos" => $departamentos));       
    }

    public function eliminar_texto($id_texto){
        $texto = Texto::findOrFail($id_texto);
        $texto->delete();
        alert()->success('Texto eliminado correctamente','Se ha eliminado el texto');
        return redirect()->back(); 
    }

    public function eliminar_personal($id_personal){
        $personal = Personal::findOrFail($id_personal);
        $personal->delete();
        alert()->success('Usuario eliminado correctamente','Se ha eliminado un usuario');
        return redirect()->back(); 
    }

    public function eliminar_pregunta($id_pregunta){
        $pregunta = Pregunta::findOrFail($id_pregunta);
        $pregunta->delete();
        alert()->success('Pregunta eliminada correctamente','Se ha eliminado una pregunta');
        return redirect()->back();
    }

    public function eliminar_respuesta($id_respuesta){
        $respuesta = Respuesta::findOrFail($id_respuesta);
        $respuesta->delete();
        alert()->success('Respuesta eliminada correctamente','Se ha eliminado una opción de respuesta');
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

    
    public function guardar_pdfs($id_texto){
        /*setlocale(LC_TIME, 'Spanish');
        $date=Carbon::now();
        $date->format('d-m-Y');
        $date=$date->formatLocalized('%d de %B de %Y');*/


        $datee = Carbon::now()->locale('es');
        $dat = $datee->isoFormat('dddd LL');
        $date = $datee->format('Y-m-d'); 
        $texto = Texto::where('id_texto',$id_texto)->first();
        $registros = Registro::join('personals','registros.id_personal','personals.id_personal')
                            ->join('departamentos','personals.id_departamento','departamentos.id_departamento')                                    
                            ->select('registros.id_registro','registros.id_personal','registros.id_texto','registros.fecha',
                                    'personals.nombre as nombre','personals.cedula as cedula'
                                    ,'departamentos.departamento as nombre_departamento')                                           
                            ->where('id_texto',$id_texto)->orderBy('personals.nombre')->get(); 
        $pdf = PDF::loadView('registro_ecnuesta',compact('registros','texto','dat'));
        return $pdf->stream("historial encuesta de {$texto->titulo} {$date}.pdf");
    }

    public function validar_departamento($nombre_departamento){
        $departamentos = departamento::all();
        foreach ($departamentos as $departamento){
            if($departamento->departamento == $nombre_departamento){
                return true;
            }
        }
        return false;
    }
    
    public function validar_pregunta($nombre_pregunta,$id_texto){
        $preguntas = Pregunta::where('id_texto',$id_texto)->get();
        foreach ($preguntas as $pregunta){
            if($pregunta->pregunta == $nombre_pregunta){
                return true;
            }
        }
        return false;
    }

    public function validar_texto($titulo){
        $textos = Texto::all();
        foreach ($textos as $texto){
            if($texto->titulo == $titulo){
                return true;
            }
        }
        return false;
    }
   
}


