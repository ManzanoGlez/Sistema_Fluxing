<?php

namespace App\Http\Controllers;

use App\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViajeController extends Controller
{
    public function Viajes(){
        //Consultas
        $LlenaTabla = DB::select("
                        SELECT Vv.Id_Viatico,(SELECT CONCAT(Nombres, ' ', Apellidos) As Empleado
                         FROM Empleado where Id_Empleado = V.ID_Empleado) AS Empleado,
                         (SELECT CONCAT(Nombre_Proyecto, ' ', Codigo) AS Proyecto From Proyecto where ID_Proyecto = V.ID_Proyecto) AS Proyecto,
                        Fecha_salida,Fecha_Regreso,Destino,Vv.Total_Viaticos,V.Estatus
                         FROM Viatico Vv JOIN Viaje V ON V.id_viaje = Vv.id_viaje");

        return view('Viaticos_viaje.viajes')->with('LlenaTabla',$LlenaTabla);
    }
}
