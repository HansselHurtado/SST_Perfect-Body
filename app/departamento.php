<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = "departamentos"; 
    protected $primaryKey = 'id_departamento';

    public function personal(){
        return $this->hasMany('App\Personal','id_departamento');
    }

    public function registro(){
        return $this->hasMany('App\Registro','id_departamento');
    }
}
