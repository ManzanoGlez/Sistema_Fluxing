@extends('Plantilla.layout')
@section('Contenido')
    <script src="{{url('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

    <div class="container-fluid">
        <h2>Proyectos</h2>
        <br>
        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="{{url('Img/Add.png')}}"><a class="nav-link-text" href="Registro_Proyecto.php">&nbsp;Registrar Proyecto</a>
        <img src="{{url('Img/seleccion.png')}}"><a class="nav-link-text" href="Asignar_Proyecto.php">&nbsp;Asignar Proyecto</a>

        <br>
        <br>

        <!-- Tabla de datos-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>&nbsp;Administración de proyectos</div>
            <div class="card-body">


                <div class="col-md-3">
                    <div class="input-group">


                        <script type="text/javascript">
                            $(document).ready(function () {
                                (function ($) {
                                    $('#filtrar').keyup(function () {
                                        var rex = new RegExp($(this).val(), 'i');
                                        $('.buscar tr').hide();
                                        $('.buscar tr').filter(function () {
                                            return rex.test($(this).text());
                                        }).show();
                                    })
                                }(jQuery));
                            });
                        </script>

                        <span class="input-group-addon">Buscar</span>
                        <input id="filtrar" type="text" class="form-control" placeholder="...">
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>

                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Proyecto</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Estatus</th>
                            <th width="10"></th>
                            <th width="10"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Proyecto</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Estatus</th>
                            <th width="10"></th>
                            <th width="10"></th>
                        </tr>
                        </tfoot>
                        <tbody class="buscar">
                        <!-- Generamos el listado vaciando las variables de la consulta en la tabla -->
                        @foreach ($LlenaTabla as $proyectos)
                        <tr>
                            <td>{{$proyectos->ID_Proyecto}}</td>
                            <td>{{$proyectos->Codigo}}</td>
                            <td>{{$proyectos->Nombre_Proyecto}}</td>
                            <td>{{$proyectos->Cliente}}</td>
                            <td>{{$proyectos->Vendedor}}</td>
                            <td>{{$proyectos->Fecha_Inicio}}</td>
                            <td>{{$proyectos->Fecha_Termino}}</td>
                            <td>{{$proyectos->Estatus}}</td>
                            <td>
                                <a class="btn btn-primary" href="Modificar_Proyecto.php?ID_proyecto={{$proyectos->ID_Proyecto}}" id="BtnVer">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    @include('Plantilla.Notificaciones')
@endsection