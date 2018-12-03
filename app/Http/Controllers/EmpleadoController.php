<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class EmpleadoController extends Controller
{
//Vistas
    public function empleados(){

     $busqueda = Input::get('buscar');
    if($busqueda){
         $LlenaTabla = DB::table('empleado')
             ->join('usuario', 'empleado.ID_Empleado', '=', 'usuario.ID_Empleado')
             ->select('usuario.ID_Usuario', 'empleado.Nombres', 'empleado.Apellidos', 'empleado.Correo', 'empleado.telefono', 'empleado.Puesto', 'empleado.Area')
             ->where('Nombres','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->Orwhere('Apellidos','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->Orwhere('Correo','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->Orwhere('telefono','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->Orwhere('Puesto','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->Orwhere('Area','LIKE',"%$busqueda%")->where('usuario.Estatus', 'Activo')->where('empleado.Estatus', 'Activo')
             ->get();
    }else {

         $LlenaTabla = DB::table('empleado')
             ->join('usuario', 'empleado.ID_Empleado', '=', 'usuario.ID_Empleado')
             ->select('usuario.ID_Usuario', 'empleado.Nombres', 'empleado.Apellidos', 'empleado.Correo', 'empleado.telefono', 'empleado.Puesto', 'empleado.Area')
             ->where('usuario.Estatus', 'Activo')
             ->where('empleado.Estatus', 'Activo')
             ->paginate(10);

     }
        return view('Empleado.empleados')->with('LlenaTabla',$LlenaTabla);
    }

    public function empleado_registro(){ return view('Empleado.registro_empleado'); }

    public function ver_empleado($id){

        $Usuario = Usuario::where('ID_Usuario',$id)
            ->where('usuario.Estatus', '=','Activo')
            ->first();
        $Usuario->Empleado;

       $empleado = DB::table('empleado')
           ->join('usuario', 'empleado.ID_Empleado', '=', 'usuario.ID_Empleado')
           ->select('empleado.*','usuario.*')
           ->where('usuario.Estatus', '=','Activo')
           ->where('empleado.Estatus', '=','Activo')
           ->where('empleado.ID_Empleado', $id)->get();

            $empleado = $empleado[0];

    return view('Empleado.ver_empleado')->with('empleado',$empleado)->with('id',$id);
}

// Api
    public function registrar_empleado(Request $request){

        if($request->has(
            ['Nombres','Apellidos','NSS','RFC','CURP','Fecha_nacimiento','Fecha_Ingreso',
                'Celular/Telefono','Dirección','Puesto','Area','Salario','Correo','T_Cuenta','passwordNew'])){

      $Empleado = DB::update("exec [dbo].[sp_Alta_Empleado] ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?;",[
                $request->input('NSS'),
                $request->input('Nombres'),
                $request->input('Apellidos'),
                $request->input('Dirección'),
                $request->input('Celular/Telefono'),
                $request->input('RFC'),
                $request->input('Fecha_nacimiento'),
                $request->input('CURP'),
                $request->input('Correo'),
                $request->input('Fecha_Ingreso'),
                $request->input('Puesto'),
                $request->input('Area'),
                $request->input('Salario'),
                $request->input('passwordNew'),
                $request->input('T_Cuenta')
            ]);

        if($Empleado){
             $msg = 'Empleado registrado';
             $codigo = 200;
            }else{
            $msg = 'Ups lo sentimos hubo un error, intentalo mas tarde';
            $codigo = 400;
            }
        }else{
            $msg = 'No enviaste todos los parametros necesarios';
            $codigo = 400;
        }

        session_start();
        $_SESSION['msg'] = $msg;
        $_SESSION['codigo'] = $codigo;
        return redirect()->route('Empleados');
    }

    public function editar_empleado(Request $request){

        if($request->has(
            ['id','Nombres','Apellidos','NSS','RFC','CURP','Fecha_nacimiento','Fecha_Ingreso',
                'Celular/Telefono','Dirección','Puesto','Area','Salario','Correo','T_Cuenta','passwordNew'])){

            $Empleado = DB::update("exec [dbo].[sp_Modificar_Empleado] ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?;",[
                $request->input('id'),
                $request->input('NSS'),
                $request->input('Nombres'),
                $request->input('Apellidos'),
                $request->input('Dirección'),
                $request->input('Celular/Telefono'),
                $request->input('RFC'),
                $request->input('Fecha_nacimiento'),
                $request->input('CURP'),
                $request->input('Correo'),
                $request->input('Fecha_Ingreso'),
                $request->input('Puesto'),
                $request->input('Area'),
                $request->input('Salario'),
                $request->input('passwordNew'),
                $request->input('T_Cuenta')

            ]);

            if($Empleado){
                $msg = 'Cambios guardados';
                $codigo = 200;
            }else{
                $msg = 'Ups lo sentimos hubo un error, intentalo mas tarde';
                $codigo = 400;
            }
        }else{
            $msg = 'No enviaste todos los parametros necesarios';
            $codigo = 400;
        }

        session_start();
        $_SESSION['msg'] = $msg;
        $_SESSION['codigo'] = $codigo;
        return redirect()->route('Empleados');

    }

    public function Elimina_Empleado(Request $request){

        if($request->has('idElimina')){

        $Empleado = DB::update("exec [dbo].[sp_Baja_Empleado] ?;",[$request->input('idElimina')]);

            if($Empleado){
                $msg = 'Empleado Eliminado';
                $codigo = 200;
            }else{
                $msg = 'Ups lo sentimos hubo un error, intentalo mas tarde';
                $codigo = 400;
            }
        }else{
            $msg = 'No enviaste todos los parametros necesarios';
            $codigo = 400;
        }

        session_start();
        $_SESSION['msg'] = $msg;
        $_SESSION['codigo'] = $codigo;
        return redirect()->route('Empleados');
    }

    public function listar_empleados(){

        $u = Usuario::paginate(15);
        foreach ($u as $usuario) {
            $rs['data'] = $u;
            $usuario->Empleado;
        }
        $rs['exito'] = 200;

        return json_encode($rs);
    }

    public function buscar_empleados(Request $request){

        if($request->has(['id'])){

        $empleado = Empleado::find($request->input("id"));

            $rs = $empleado;
            $rs['exito'] = 200;

        }else{
            $rs['data'] = "No se enviaron los parametros necesarios";
            $rs['status'] = 403;
        }
        return json_encode($rs);
    }


}
