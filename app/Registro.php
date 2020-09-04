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

    public function texto()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\Texto');
    }

    public function registro_pregunta_respuesta()
    {
        return $this->hasMany('App\Registro_pregunta_respuesta','id_registro');
    }

}
