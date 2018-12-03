<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{

    protected $table= "USUARIO";
    protected $primaryKey = 'ID_Usuario';
    protected $hidden = ["Contraseña"];

    public function Empleado(){
        return $this->hasOne('App\Empleado','ID_Empleado','ID_Empleado');
    }

}
