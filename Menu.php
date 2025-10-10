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
                    if (isset($_POST['exe_C'])) { launch('Compras');}
                    if (isset($_POST['exe_V'])) { launch('Ventas');}
                    if (isset($_POST['exe_S'])) { launch('Login');}
        ?>
        <p>
            <a href="Login.php">Salir</a>
        </p>
    </body>
</html>