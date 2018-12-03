<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;


Route::post('Empleados/registro','EmpleadoController@registrar_empleado')->name('Api_RegistroEmpleados');
Route::post('Empleados/editar','EmpleadoController@editar_empleado')->name('Api_Editar_Empleado');
Route::post('Empleados/elimina','EmpleadoController@Elimina_Empleado')->name('Api_Elimina_Empleado');

Route::post('listar_empleados','EmpleadoController@listar_empleados');
Route::post('buscar_empleados','EmpleadoController@buscar_empleados');