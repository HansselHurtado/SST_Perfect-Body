<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registros"; 
    protected $primaryKey = 'id_registro';

    public function personal()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Personal');
    }

    public function pregunta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function respuesta()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Respuesta');
    }

    public function texto()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Texto');
    }
}
