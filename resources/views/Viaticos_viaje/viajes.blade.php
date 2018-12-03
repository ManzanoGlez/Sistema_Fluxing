@extends('Plantilla.layout')
@section('Contenido')
    <script src="{{url('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

    <div class="container-fluid">
        <h2>Administración de viáticos</h2>
        <br>

        <!-- Tabla de datos-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>&nbsp;Administración de viáticos</div>
            <div class="card-body">


                <div class="col-md-3">
                    <div class="input-group">


                        <script type="text/javascript">
                            $(document).ready(function() {
                                (function($) {
                                    $('#filtrar').keyup(function() {
                                        var rex = new RegExp($(this).val(), 'i');
                                        $('.buscar tr').hide();
                                        $('.buscar tr').filter(function() {
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
                            <th>Trabajador</th>
                            <th>Proyecto</th>
                            <th>Fecha Salida</th>
                            <th>Fecha Regreso</th>
                            <th>Destino</th>
                            <th>Estatus</th>
                            <th width="10"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Trabajador</th>
                            <th>Proyecto</th>
                            <th>Fecha Salida</th>
                            <th>Fecha Regreso</th>
                            <th>Destino</th>
                            <th>Estatus</th>
                            <th width="10"></th>
                        </tr>
                        </tfoot>
                        <tbody class="buscar">

                        @foreach($LlenaTabla as $viajes)
                        <tr>
                            <td>
                                {{$viajes->Id_Viatico}}
                            </td>
                            <td>
                                {{$viajes->Empleado}}
                            </td>
                            <td>
                                {{$viajes->Proyecto}}
                            </td>
                            <td>
                                {{$viajes->Fecha_salida}}
                            </td>
                            <td>
                                {{$viajes->Fecha_Regreso}}
                            </td>
                            <td>
                                {{$viajes->Destino}}
                            </td>
                            <td>
                                {{$viajes->Estatus}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="Supervisar_Viaticos.php?ID_Viatico={{$viajes->Id_Viatico}}" id="BtnVer">Ver</a>
                            </td>
                        </tr>
                     @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

@endsection