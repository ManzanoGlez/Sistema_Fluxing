<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use MercurySeries\Flashy\Flashy;

class UsuarioController extends Controller{

  public function login(Request $request){
        if($request->has('Correo') && $request->has('Contraseña')){

             $u = $request->input('Correo');
             $p = $request->input('Contraseña');

  $query = DB::select('exec sp_Login_Usuarios ?,?',[$u,$p]);

  if(isset($query[0]->msg) && $query[0]->msg == 'FALSE'){
      $msg = 'Usuario o contraseña incorrecta';
  }else{

      //Crea sesión
      $request->session()->put('fluxing', $query[0]->ID_Usuario);
      Session::put('fluxing', $query[0]->ID_Usuario);
      return redirect()->route('Proyectos')->withSesion($query[0]->ID_Usuario);
  }
        }else{
        $msg = 'No enviaste todos los parametros'; }
        flashy()->error($msg, 'login');
        return view('iniciar_sesion');
    }

  public function cerrar_sesion(){
      Session::flush();
      return redirect()->route('iniciarSesion');
    }








}
