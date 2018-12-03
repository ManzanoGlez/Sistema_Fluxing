<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {

    protected $table= "EMPLEADO";
    protected $primaryKey = 'ID_Empleado';
    protected $fillable = ['Nombres','Apellidos','Correo','Telefono','Puesto','Area'];

    public function Usuario(){
        return $this->hasOne('App\Usuario','ID_Usuario','ID_Usuario');
    }

}
