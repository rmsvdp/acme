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
        <title>Módulo de Ventas</title>
        <?php
            echo '<h3 style="text-align: right;"> USUARIO:'.$_SESSION["_USER"].' ROL:'.$_SESSION["_ROL"].'</h3>';
        ?>
    </head>
    <body>

    <h1 style="text-align: center;">Ventana de Ventas</h1>
        <p>
            <a href="Login.php">Salir</a>
        </p>
    </body>
</html>