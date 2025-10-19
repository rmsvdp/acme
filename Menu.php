<!DOCTYPE html>
<?php
/**
 * @category file
 * Gestiona la página menu.php
 */
include_once "debug.php";
require_once "Usuario.php";
session_start(); 
// Comprobar si la aplicación está activa y si se invoca desde la página correcta
if (!isset($_SESSION["acme_on"])|| ($_SESSION["acme_on"]!="Menu"))
    {   
        header('Location: Login.php');
        exit();
    }    
?>
<?php
//-------------------- Funciones
/** 
 * launch : manejador de opciones, navega hacia la pagina indicada
 * se utiliza el mismo identificador para la opción que para la página, así
 * es muy fácil construir la ruta
 * @param $opcion opcion y página hacia la que navegar
 * @return void
 *  */    
function launch($opcion){

    $_SESSION["acme_on"] = $opcion;         // Establezo la nueva página
    header('Location: '. $opcion .'.php');         // La invoco
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
        <br>
        <h1 style="text-align: center;"> ACME : Menu de Opciones </h1>
        <!--- Mostrar el usuario -->
        <?php
            echo '<p>'.$_SESSION["objUsuario"]->nombre .'</p>';
        ?>
        <!-- Botones que implementan las 3 opciones, formateados con bootstrap -->
        <div class="container mt-5">
            <div class="d-flex justify-content-center" style="max-width: 600px; margin: 0 auto;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="w-100">
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-outline-success w-100" name="exe_C">Módulo Compras</button>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-outline-info w-100" name="exe_V">Módulo Ventas</button>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-danger w-100" name="exe_S">Salir</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                    if (isset($_POST['exe_C'])) { launch('Compras');}       // Botón compras pulsado
                    if (isset($_POST['exe_V'])) { launch('Ventas');}        // Botón ventas pulsado
                    if (isset($_POST['exe_S'])) { launch('Login');}         // Botón salir pulsado
        ?>
        <p>
            <a href="Login.php">Salir</a>                                   <!-- Enlace href a la página de login -->
        </p>
    </body>
</html>