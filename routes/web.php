<?php
use \Illuminate\Support\Facades\Route;


   Route::get('/', function () { return view('index'); })->name('index');
   Route::get('/login', function () { return view('iniciar_sesion');})->name('iniciarSesion');
   Route::post('login', 'UsuarioController@login')->name('login');

 Route::group(['middleware' => 'ValidaSesion'],function (){

     Route::get('cerrar_sesion', 'UsuarioController@cerrar_sesion')->name('cerrar_sesion');
     Route::get('/dashboard/',  'UsuarioController@dashboard' )->name('dashboard');

     Route::get('/dashboard/Empleados', 'EmpleadoController@empleados')->name('Empleados');
     Route::get('/dashboard/Empleados/registro', 'EmpleadoController@empleado_registro')->name('RegistroEmpleados');
     Route::get('/dashboard/Empleados/ver/{id}',  'EmpleadoController@ver_empleado')->name('Ver_empleado');

     Route::get('/dashboard/Proyectos', 'ProyectoController@proyectos' )->name('Proyectos');
     Route::get('/dashboard/Viajes','ViajeController@viajes')->name('Viajes');

});

