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
        <title>Ventana de Login</title>
    </head>
    <body>

<h1>Ventana de login</h1>

		<!-- Formulario de interacción con el usuario	-->
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="name">
        </div>
        <div>
            <label for="password">Contaseña:</label>
            <input type="password" name="password" id="password">
        </div>
        <section style="margin-left:2rem;">
            <button type="submit" name="login">Entrar</button>
        </section>
        </form>
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