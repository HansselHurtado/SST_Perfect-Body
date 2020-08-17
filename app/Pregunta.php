<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = "preguntas"; 
    protected $primaryKey = 'id_pregunta';

    public function registro(){
        return $this->hasMany('App\Registro','id_pregunta');
    }

    public function respuesta(){
        return $this->hasMany('App\Respuesta','id_respuesta');
    }

    public function texto()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Texto');
    }
}
