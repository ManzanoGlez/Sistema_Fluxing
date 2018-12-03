@extends('Plantilla.layout')
@section('Contenido')
    <script src="{{url('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>


    <div class="container-fluid">
        <h2>Empleados!</h2>
        <br>
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="{{url('Img/Add.png')}}" href="{{route('RegistroEmpleados')}}">
        <a class="nav-link-text" href="{{route('RegistroEmpleados')}}">&nbsp;Agregar</a>
        <br>
        <br>

        <!-- Tabla de datos-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Gestión de Trabajadores</div>
            <div class="card-body">
                <div style="float: right" class="col-md-3">
                    <div class="input-group">

                        <input id="filtrar" type="search" class="form-control" placeholder="..."  style="margin-right: 5px">
                        <button   class="btn btn-primary"  onclick="busca()">Buscar</button>
                    </div>
                </div>
        <br>
        <br>
              <div class="table-responsive">
                    <table class="table table-hover" id="my-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Puesto</th>
                            <th>Área</th>
                            <th width="10"></th>
                            <th width="10"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Área</th>
                            <th>Puesto</th>
                            <th width="10"></th>
                            <th width="10"></th>
                        </tr>
                        </tfoot>
                        <tbody class="buscar">
                        @foreach ($LlenaTabla as $Empleados)

                        <tr>
                            <td> {{$Empleados->Nombres}}</td>
                            <td> {{$Empleados->Correo}} </td>
                            <td> {{$Empleados->telefono}} </td>
                            <td> {{$Empleados->Puesto}}</td>
                            <td> {{$Empleados->Area}} </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('Ver_empleado',$Empleados->ID_Usuario) }}" id="BtnVer">Ver</a>
                            </td>
                            <td>
                                <button class="btn btn-primary"  onclick="elimina('{{$Empleados->ID_Usuario}}','{{$Empleados->Nombres}}')">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>

       @php
       try{
       echo '<div style="float: right;">'.$LlenaTabla->links().'</div>';
       }catch(BadMethodCallException $e){ }
       @endphp
            </div>
        </div>
        </div>


    <!-- Elimina Modal-->
    <div class="modal fade" id="elimina-Modal" tabindex="-1" role="dialog" aria-labelledby="elimina-ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="elimina-ModalLabel">¿Estas seguro de eliminar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Se eliminara al usuario : <label id="Elimina_Nombre"></label></div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('Api_Elimina_Empleado')}}">

                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancelar</button>
                        <input hidden id="idElimina" name="idElimina" >
                    <button class="btn btn-primary" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function elimina(id,nombre) {
            $('#Elimina_Nombre').text(nombre);
            $("#idElimina").val(id);
            $('#elimina-Modal').modal( {show: true });

        }

        function busca(){
            let filtrar = document.getElementById("filtrar").value;
            if(filtrar === ""){
                location.href = 'Empleados';
            }else{
                location.href = 'Empleados?buscar='+filtrar;
            }
        }
    </script>

    @include('Plantilla.Notificaciones')
@endsection