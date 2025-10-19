<!DOCTYPE html>

<?php 
/**
 * @category file
 * Ventana de login, punto de entrada a la aplicación ACME
 * @version 1.0.0
 */
session_start(); 
if (isset($_SESSION["acme_on"]))
    {   
    session_destroy();  // Eliminar rastros de sesiones anteriores
    }
?>
<?php
/**
 * requires e includes necesarios
 * clases : usuario.php
 * funciones auxiliares : bd.php (datos) y debug.pgp (depuración)
 */
require_once "Usuario.php";
include_once "bd.php";
include_once "debug.php";
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ventana de Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    </head>
    <body>

<h1>ACME : Entrada al Sistema</h1>
<div class="container mt-5" style="max-width: 400px;">
		<!-- Formulario de interacción con el usuario	-->
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="username" id="name">
        </div>
        <div>
            <label for="password" class="form-label">Contaseña:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <section style="margin-left:2rem;">
            <br>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary w-50" name="login">Entrar</button>
        </div>
        </sectionphp>
        </form>
</div>
		<hr>
		<section id = "sol">
			<?php 
			// Declarar funciones de la página
            /**
             * check_user Comprueba si las credenciales están en la lista de usuarios registrados
             * @param String $u Nombre de usuario
             * @param String $p Contraseña
             * @param Mixed $lista Lista de usuarios registrado
             * 
             * @return bool $res Resultado de la operación true/false
             */
            function check_user($u,$p,$lista){
                $res = false;
                foreach ($lista as $user){

                    if (($user->nombre == $u) &&($user->pwd == $p)){
                        $res = true;
                        $rol = $user->rol;
                        $_SESSION["objUsuario"] = $user;
                        $_SESSION["_USER"] = $u;
                        $_SESSION["_ROL"] = $rol;

                        break;
                    }
                } // foreach
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
                    $_SESSION["acme_on"]="Menu";    // Indicamos a donde se debería navegar
                    $nuevaURL = 'Menu.php';        // Página que implementa la función
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