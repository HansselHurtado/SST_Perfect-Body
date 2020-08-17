<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = "personals"; 
    protected $primaryKey = 'id_personal';

    public function registro(){
        return $this->hasMany('App\Registro','id_personal');
    }

    public function departamento()//relacion inversa de uno a mucho
    {
        return $this->belongsTo('App\departamento');
    }

}
