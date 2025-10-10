<!DOCTYPE html>
<?php
include_once "debug.php";
session_start(); 
if (!isset($_SESSION["acme_on"])|| ($_SESSION["acme_on"]!="Menu"))
    {   
        header('Location: Login.php');
        exit();
    }
?>
<?php
//-------------------- Funciones
    function launch($opcion){

    $_SESSION["acme_on"] = $opcion;
    header();
    exit;
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ventana de menú</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    </head>
    <body>
        <h1 style="text-align: center;"> ACME : Menu de Opciones </h1>
<!--
        <div class="container mt-5" style="max-width: 600px;">
            <div class="list-group">
                <a href="Compras.php" class="list-group-item list-group-item-action list-group-item-primary">Módulo de Compras</a>
                <a href="Ventas.php" class="list-group-item list-group-item-action list-group-item-secondary">Módulo de Ventas</a>
                <a href="Login.php" class="list-group-item list-group-item-action list-group-item-danger">Salir</a>
            </div>
        </div>
-->
        <div class="container mt-5" style="max-width: 600px;">
        
    </div>
    </body>
</html>