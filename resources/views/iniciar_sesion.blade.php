<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 07/10/2018
 * Time: 11:31 a.m.
 */
session_start();
if(isset($_SESSION['fluxing'])){
    header('Location: '.route('Proyectos'));
    exit;
}

?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Sistema de Administración de Viaticos" content="">
    <meta name="Jorge Manzano" content="">

    <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <title>Administrador de Viaticos Fluxing</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('css/logo-nav.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{url('Img/logoExterno.png')}}" width="230" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('iniciarSesion')}}">Iniciar Sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="card card-login mx-auto mt-5" style="width: 600px; height: 350px;">
        <div class="card-header">Iniciar Sesión</div>
        <div class="card-body">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label>Correo Electrónico de Fluxing</label>
                    <input class="form-control" id="Correo" type="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico" name="Correo">
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input class="form-control" id="Contraseña" type="password" placeholder="Contraseña" name="Contraseña">
                </div>
                <div class="form-group">
                </div>
                <input type="submit" tabindex="10" class="btn btn-primary btn-block" value="Iniciar Sesión" name="Iniciar">

                @include('flashy::message')

            </form>
        </div>
    </div>
</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript -->


</body>

</html>
