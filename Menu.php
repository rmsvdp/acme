<!DOCTYPE html>
<?php
include_once "debug.php";
session_start(); 
if (!isset($_SESSION["acme_on"]))
    if (!$_SESSION["acme_on"]){
        header('Location: Login.php');
        exit(); 
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ventana de menú</title>
    </head>
    <body>
        <h1> ACME : Menu de Opciones </h1>
        <p>
                <a href="Compras.php">Módulo Compras</a>
        </p>
        <p>
                <a href="Ventas.php">Módulo Ventas</a>
        </p>
        <p>
                <a href="Login.php">Salir</a>
        </p>

    </body>
</html>