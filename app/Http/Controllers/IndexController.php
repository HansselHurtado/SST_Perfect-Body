<?php

namespace App\Http\Controllers;
use App\departamento;
use App\Personal;
use App\Texto;
use App\Respuesta;
use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $departamentos = departamento::all();
        $textos = Texto::all();               
        return view('home2',compact('departamentos','textos'));
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
}
