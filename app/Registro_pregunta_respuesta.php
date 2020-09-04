<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_pregunta_respuesta extends Model
{
    protected $table = "registro_pregunta_respuestas"; 
    protected $primaryKey = 'id_registro_pregunta_respuestas';

    public function registro()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Registro');
    }
}
