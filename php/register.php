<?php
include_once 'app.php';
$app = new App();
$app->menu_register();
$app->show_head_register("Registro");
?>
    <h2 class="form-signin-heading text-center">Registro</h2>
    <div class="container">
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">

            <input type="radio" name="radio" value="empresa" onclick="showEmpresa();"/>
            Empresa

            <input type="radio" name="radio" value="alumno" onclick="showAlumno();" checked="checked"/>
            Alumno
            <!-- -->

            <div id="div3" class="hide">
                <!-- EMPRESA -->

                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" maxlength="30" class="form-control" id="username"
                           placeholder="Nombre de usuario" name="username" required="required"/>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" maxlength="30" class="form-control" id="password" placeholder="Contraseña"
                           name="password" required="required"/>
                </div>
                <div class="form-group">
                    <label for="passwordAgain">Confirmacion de Contraseña:</label>
                    <input type="password" maxlength="100" class="form-control" id="passwordAgain"
                           placeholder="Confime la contraseña" name="passwordAgain" required="required"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" maxlength="30" class="form-control" id="email"
                           placeholder="Introduce tu correo electronico" name="email" required="required"/>
                </div>

                <div class="form-group">
                    <label for="promo">Teléfono:</label>
                    <input type="number" class="form-control" placeholder="Teléfono" id="telefonoE" name="telefonoE"
                           required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Nombre de la empresa:</label>
                    <input type="text" maxlength="100" class="form-control" id="nombreEmpresaE" placeholder="Introduce el nombre de la empresa"
                           name="nombreEmpresaE" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Dirección empresa:</label>
                    <input type="text" maxlength="100" class="form-control" id="direccionEmpresa"
                           placeholder="Dirección de la empresa"
                           name="direccionEmpresa" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Nombre persona de contacto:</label>
                    <input type="text" maxlength="100" class="form-control" id="nombreContactoE" placeholder="Nombre persona de contacto"
                           name="nombreContactoE" required="required"/>
                </div>
                <p></p>
            </div>


            <!-- ALUMNO -->
            <div id="div2" class="hide">

                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" maxlength="30" class="form-control" id="usernameA"
                           placeholder="Introduce tu nombre de usuario" name="usernameA" required="required"/>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" maxlength="30" class="form-control" id="passwordA" placeholder="Contraseña"
                           name="passwordA" required="required"/>
                </div>
                <div class="form-group">
                    <label for="passwordAgain">Confirmacion de Contraseña:</label>
                    <input type="password" maxlength="100" class="form-control" id="passwordAgainA"
                           placeholder="Confime la contraseña" name="passwordAgainA" required="required"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" maxlength="30" class="form-control" id="emailA"
                           placeholder="Introduce tu correo electronico" name="emailA" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" maxlength="100" class="form-control" id="nameA" placeholder="Introduce tu nombre"
                           name="nameA" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Apellidos:</label>
                    <input type="text" maxlength="100" class="form-control" id="surnameA"
                           placeholder="Introduce tu apellido"
                           name="surnameA" required="required"/>
                </div>

                <div class="form-group">
                    <label for="promo">Año de la promoción:</label>
                    <input type="number" min="1900" step="1" class="form-control" id="promocion" name="promocion"
                           required="required"/>
                </div>

                <p>Estado laboral:</p>
                <input type="radio" name="radioEstado" value="desempleado" onclick="show1();"/>
                Desempleado
                <input type="radio" name="radioEstado" value="empleado" onclick="show2();" checked="checked"/>
                Empleado
                <div id="div1" class="hide">
                    <hr>
                    <p>Nombre de la empresa:</p>
                    <input type="text" maxlength="30" class="form-control" id="nombreEmpresa"
                           placeholder="Nombre de la empresa" name="nombreEmpresa"/>
                    <p></p>
                    <p>Tiempo en la empresa:</p>
                    <input type="month" class="form-control" id="tiempoEmpresa" name="tiempoEmpresa"/>
                </div>

            </div>
            <p></p>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "1.0";

    $passwordA = $_POST['passwordA'];
    $passwordAgainA = $_POST['passwordAgainA'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];

    $rbAlumnoEmpresa = $_POST['radio'];
    $radioEstado = $_POST['radioEstado'];

    echo "<span>You have selected :<b> " . $rbAlumnoEmpresa . "</b></span>";

    if ($password == $passwordAgain || $passwordA == $passwordAgainA) {
        echo "1.1";
        $usernameA = $_POST['usernameA'];
        $emailA = $_POST['emailA'];
        $nameA = $_POST['nameA'];
        $surnameA= $_POST['surnameA'];
        $promoA = $_POST['promocion'];
        $nombreEmpresa = $_POST['nombreEmpresa'];
        $tiempoEmpresa = $_POST['tiempoEmpresa'];
        $direccionEmpresa = $_POST['direccionEmpresa'];
        $nombreContactoE = $_POST['nombreContactoE'];
        $telefonoE = $_POST['telefonoE'];
        $nombreEmpresaE = $_POST['nombreEmpresaE'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        if($app->getDao()->isConnected()){
            echo "Hay conexion";
        }

        if ($rbAlumnoEmpresa == "alumno" && $app->getDao()->isConnected() && $radioEstado == "desempleado") {
            echo "2";
            if ($app->getDao()->addAlumno($usernameA, $passwordA, $nameA, $surnameA, $promoA, $emailA, 1)) {
                echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
            } else {
                echo "<h3>Error en la base de datos.</h3>";
            }
        } elseif ($rbAlumnoEmpresa == "alumno" && $app->getDao()->isConnected() && $radioEstado == "empleado") {
            echo "3";
            if ($app->getDao()->addAlumnoNombreEmpresa($usernameA, $passwordA, $nameA, $surnameA, $promoA, $emailA, 1, $nombreEmpresa, $tiempoEmpresa)) {
                echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
            } else {
                echo "<h3>Error en la base de datos.</h3>";
            }

        } elseif ($rbAlumnoEmpresa == "empresa" && $app->getDao()->isConnected()) {
            echo "4";
            if ($app->getDao()->addEmpresa($username, $password, $nombreContactoE, $email, $telefonoE, $direccionEmpresa, $nombreEmpresaE)) {
                echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
            } else {
                echo "<h3>Error en la base de datos.</h3>";
            }
        }else
        {
            echo "No se ha seleccionado ningún campo.";
        }
    } else {
        echo "<h3>Error en la conexión.</h3>";
    }
}
$app->show_footer();
?>