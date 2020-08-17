<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = "textos"; 
    protected $primaryKey = 'id_texto';

    public function registro(){
        return $this->hasMany('App\Registro','id_texto');
    }

    public function pregunta(){
        return $this->hasMany('App\Pregunta','id_texto');
    }
}
