<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Sistema Fluxing">
    <meta name="Jorge Manzano">
    <title>Menu Principal</title>

    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled">

<!-- Menu Lateral-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="{{url('Img/Index/logoInterno.png')}}" width="230" height="60">
    <a class="navbar-brand" href="{{route('Empleados')}}">Cuenta : {{Session::get('Usuario')}}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <hr>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empleados">
                <a class="nav-link" href="{{route('Empleados')}}">
                    <img src="{{url('Img/M_Trabajadores.png')}}">
                    <span class="nav-link-text">&nbsp;&nbsp;&nbsp;&nbsp;Empleados</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Proyectos">
                <a class="nav-link" href="{{route('Proyectos')}}">
                    <img src="{{url('Img/M_Proyectos.png')}}">
                    <span class="nav-link-text">&nbsp;&nbsp;&nbsp;&nbsp;Proyectos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Viajes">
                <a class="nav-link" href="{{route('Viajes')}}">
                    <img src="{{url('Img/Viaje.png')}}">
                    <span class="nav-link-text">&nbsp;&nbsp;&nbsp;&nbsp;Viáticos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Viajes">
                <!-- Fin Menu Lateral-->
                <!-- Notificaciónes-->

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">

                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                </label>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>
</body>

<div class="content-wrapper">
    <!--Contenido Principa-->
         @yield('Contenido')
    <!-- Fin Contenido Principa-->
 <br>
   <br>
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Fluxing 2018</small>
        </div>
    </div>
</footer>

<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de querer cerrar sesión?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccióna 'Salir' para cerrar sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{route('cerrar_sesion')}}">Salir</a>
            </div>
        </div>
    </div>
</div>

</div>


<!-- Bootstrap core JavaScript-->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{url('js/sb-admin.min.js')}}"></script>

</html>