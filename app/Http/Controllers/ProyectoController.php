<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function proyectos(){
        //Consultas
        $LlenaTabla = DB::select(
            "SELECT ID_Proyecto,Codigo,Nombre_Proyecto,Cliente,
   (select CONCAT(Nombres, ' ', Apellidos) As Nombre from empleado WHERE ID_Empleado = P.Vendedor) as Vendedor,
   Fecha_Inicio,Fecha_Termino,Estatus FROM PROYECTO P;");

        return view('Proyectos.proyectos')->with('LlenaTabla',$LlenaTabla);
    }

}
