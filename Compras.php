<!DOCTYPE html>
<?php 
/**
 * @category file
 * Página que simula la entrada al módulo de compras
 */
include_once "debug.php";
session_start(); 
if (!isset($_SESSION["acme_on"])|| ($_SESSION["acme_on"]!="Compras"))
    {   
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
            echo '<h3 style="text-align: right;"> USUARIO:'.$_SESSION["_USER"].' ROL:'.$_SESSION["_ROL"].'</h3>';
        ?>
    </head>
    <body>
        <h1 style="text-align: center;">Ventana de Compras</h1>
        <p>
            <a href="Login.php">Salir</a>
        </p>
    </body>
</html>