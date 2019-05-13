<?php
include_once 'app.php';
session_start();
$app = new App();
$app->show_head("Inicio de sesión");

?>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 offset-md-4 offset-col-3">
                <h2 class="form-signin-heading text-center">Inicio de sesión</h2>
                <form method="POST" action="<?= $_SERVER['PHP_SELF'];?>" class="form-signin">
                    <div class="form-group">
                        <label for="inputUser" class="col-form-label">Usuario</label>
                        <input type="text" name="user" class="form-control"  id="inputUser" value="" autofocus="autofocus" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" value="" required="required"/>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                    </div>
                </form>
                <div class="text-center">
                    <a href="register.php">
                        <p>¿No tiene cuenta? ¡Cree una!</p>
                    </a>
                </div>
            </div><!-- Col-->
        </div><!-- Row-->
    </div><!-- Container-->

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user=$_POST['user'];
    $password=$_POST['password'];
    if(empty($user))
    {
        echo "<p>Debe introducir un nombre de usuario</p>";
    }else if(empty($password))
    {
        echo "<p>Debe introducir una contraseña</p>";
    }else{
        //Realizamos la conexión a la base de datos, y se comprueba si el usuario existe.
        $app= new App();

        if(!$app->getDao()->isConnected())
        {
            echo "<p>".$app->getDao()->error."</p>";

        }elseif($app->getDao()->validateUser($user,$password)){
            // Se guarda la sesión de usuario
            $app->init_session($user);
            // Se redirecciona a la página principal
            echo "<script language=\"javascript\">window.location.href=\"home.php\"</script>";
        }else{
            echo '<script language="javascript">';
            echo 'alert(message successfully sent)';
            echo '</script>';
        }
    }
}

$app->show_footer();