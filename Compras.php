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
        <title>Módulo de compras</title>
        <?php
            echo '<h3> USUARIO:'.$_SESSION["_USER"].' ROL:'.$_SESSION["_ROL"].'</h3>';
        ?>
    </head>
    <body>
        <h1>Ventana de Compras</h1>
        <p>
            <a href="Login.php">Salir</a>
        </p>
    </body>
</html>