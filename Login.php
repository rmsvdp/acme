<!DOCTYPE html>
<?php session_start(); ?>
<?php
require_once "Usuario.php";
include_once "bd.php";
include_once "debug.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Ventana de Login</title>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <h1>Ventana de login</h1>
    <br><br>
		<!-- Formulario de interacción con el usuario	-->
        <div class="container mt-5" style="max-width: 400px;">
            <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required />
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Ingresar</button>
            </form>
        </div>
		<hr>
		<section id = "sol">
			<?php 
			// Declarar funciones de la página
            function check_user($u,$p,$lista){
                $res = false;
                foreach ($lista as $user){

                    if (($user->nombre == $u) &&($user->pwd == $p)){
                        $res = true;
                        $rol = $user->rol;
                        $_SESSION["_USER"] = $u;
                        $_SESSION["_ROL"] = $rol;
                        break;
                    }
                } // foreach
                /*
                // Solución ineficiente y poco elegante
                    if (($u=='admin' && $p=="1234")  ||
                        ($u=='compras' && $p=="1234")  ||
                        ($u=='ventas' && $p=="1234"))
                        $res=true;
                */
                return $res;
            }
			$err = FALSE;
			$msj = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {  	
			
				// Hacer comprobaciones
                $usuario = $_POST["username"];
                $pwd = $_POST["password"];
				// procesar parámetros
                $result = check_user($usuario,$pwd,$lista);
                if ($result){
                    $_SESSION["acme_on"]=true;
                    $nuevaURL = 'Menu.php';
                    header('Location: ' . $nuevaURL);
                    exit(); // Es importante usar exit() después de la redirección
                }
                else{
                    session_destroy();      // Eliminar rastros de sesión
                    echo "<script>
                            alert('Credenciales Incorrectas');
                            window.location.href = 'Login.php';
                        </script>";
                }
				// ejecutar métodos

			}	
			?>
        </section>
    </body>
</html>