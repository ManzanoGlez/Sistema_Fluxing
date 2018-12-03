@extends('Plantilla.layout')
@section('Contenido')

    <h1 class="mt-5"> Detalle de Empleados</h1>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Información del  Empleado</div>
            <div class="card-body">

                <form method="post" action="{{route('Api_Editar_Empleado')}}">
                    @csrf

                    <div class="form-group">
                        <strong><label>Datos personales :</label><br></strong>

                        <div class="form-row">

                            <div class="col-md-6">
                                <label>Nombres:</label>
                                <input class="form-control" name="Nombres" type="text" aria-describedby="nameHelp" placeholder="Nombres" required value="{{$empleado->Nombres}}">
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos:</label>
                                <input class="form-control" name="Apellidos" type="text" aria-describedby="nameHelp" placeholder="Apellidos" required value="{{$empleado->Apellidos}}">
                            </div>
                            <div class="col-md-6">
                                <label>NSS:</label>
                                <input class="form-control" name="NSS" type="text" aria-describedby="nameHelp" placeholder="NSS" required value="{{$empleado->NSS}}">
                            </div>

                            <div class="col-md-6">
                                <label>Contacto:</label>
                                <input class="form-control" name="Celular/Telefono" type="number" aria-describedby="nameHelp" placeholder="Celular/Telefono" required value="{{$empleado->Telefono}}">
                            </div>
                            <div class="col-md-6">
                                <label>RFC :</label>
                                <input class="form-control" name="RFC" type="text" aria-describedby="nameHelp" placeholder="RFC" required value="{{$empleado->RFC}}">
                            </div>
                            <div class="col-md-6">
                                <label>Fecha Nacimiento:</label>
                                <input class="form-control" name="Fecha_nacimiento" type="date" aria-describedby="nameHelp" required value="{{$empleado->Fecha_Nacimiento}}">
                            </div>
                            <div class="col-md-6">
                                <label>CURP :</label>
                                <input class="form-control" name="CURP" type="text" aria-describedby="nameHelp" placeholder="CURP" required value="{{$empleado->CURP}}">
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Dirección :</label>
                            <input class="form-control" name="Dirección" aria-describedby="emailHelp" placeholder="Dirección" style="width: 400px; height: 40px;" required value="{{$empleado->Direccion}}">
                        </div>
                        <strong><label>Datos de la empresa :</label></strong>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Puesto:</label>
                                <input class="form-control" name="Puesto" type="text" aria-describedby="nameHelp" placeholder="Puesto" required value="{{$empleado->Puesto}}">
                            </div>

                            <div class="col-md-6">
                                <label>Área:</label>
                                <input class="form-control" name="Area" type="text" aria-describedby="nameHelp" placeholder="Área" required value="{{$empleado->Area}}">
                            </div>
                            <div class="col-md-6">
                                <label>Salario:</label>
                                <input class="form-control" name="Salario" type="number" aria-describedby="nameHelp" placeholder="Salario" required value="{{$empleado->Sueldo}}">
                            </div>

                            <div class="col-md-6">
                                <label>Fecha ingreso:</label>
                                <input class="form-control" name="Fecha_Ingreso" type="date" aria-describedby="nameHelp" required value="{{$empleado->Fecha_Ingreso}}">
                            </div>

                        </div>

                    </div>
                    <strong><label>Datos de la cuenta :</label><br></strong>
                    <div class="form-group">
                        <label>Correo de la empresa :</label>
                        <input class="form-control" name="Correo" type="email" aria-describedby="emailHelp" placeholder="Correo" style="width: 400px; height: 40px;" required value="{{$empleado->Correo}}">
                    </div>
                    <div class="form-group">
                        <div class="form-row">

                            <div class="form-row">
                                <div class="col-md-6">

                                    <label>Tipo de cuenta:</label>
                                    <select class="form-control" name="T_Cuenta" type="text" aria-describedby="nameHelp" placeholder="T_Cuenta" style=" width: 250px; height: 40px;">
                                        <option value="Empleado" {{$empleado->Tipo == 'Empleado' ? 'selected' : '' }}>Empleado</option>
                                        <option value="Administrador" {{$empleado->Tipo == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Contraseña:</label>
                                <input class="form-control" name="passwordNew" type="password" placeholder="Contraseña" required value="{!! $empleado->Contraseña !!}">
                            </div>

                        </div>
                    </div>

                    <input hidden name="id" id="id" value="{{$id}}">
                    <input type="submit" class="btn btn-primary btn-block" value="Guardar cambios" name="Guardar_cambios">
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('Empleados')}}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    @include('flashy::message')
@endsection