<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Session;

class ValidaSesion{

    public function handle($request, Closure $next) {

        if(is_null(Session::get('fluxing'))){
            return redirect()->route('login');
        }else{
            $Usuario = \App\Usuario::where('ID_USUARIO',Session::get('fluxing'))->first();
            Session::put("Usuario",$Usuario->Usuario);
            return $next($request);
        }
    }
}
