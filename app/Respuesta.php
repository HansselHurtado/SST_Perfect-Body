<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = "respuestas"; 
    protected $primaryKey = 'id_respuesta';

   /* public function registro(){
        return $this->hasMany('App\Registro','id_respuesta');
    }*/

    public function preguntas()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Preguntas');
    }
}
