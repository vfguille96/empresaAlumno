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
                           placeholder="Introduce tu nombre de usuario" name="username" required="required"/>
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
                    <label for="name">Nombre:</label>
                    <input type="text" maxlength="100" class="form-control" id="name" placeholder="Introduce tu nombre"
                           name="name" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Apellidos:</label>
                    <input type="text" maxlength="100" class="form-control" id="surname"
                           placeholder="Introduce tu apellido"
                           name="surname" required="required"/>
                </div>

                <div class="form-group">
                    <label for="promo">Año de la promoción:</label>
                    <input type="number" min="1900" step="1" class="form-control" id="promoE" name="promoE"
                           required="required"/>
                </div>
                <p></p>


            </div>


            <!-- ALUMNO -->
            <div id="div2" class="hide">

                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" maxlength="30" class="form-control" id="username"
                           placeholder="Introduce tu nombre de usuario" name="username" required="required"/>
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
                    <label for="name">Nombre:</label>
                    <input type="text" maxlength="100" class="form-control" id="name" placeholder="Introduce tu nombre"
                           name="name" required="required"/>
                </div>

                <div class="form-group">
                    <label for="name">Apellidos:</label>
                    <input type="text" maxlength="100" class="form-control" id="surname"
                           placeholder="Introduce tu apellido"
                           name="surname" required="required"/>
                </div>

                <div class="form-group">
                    <label for="promo">Año de la promoción:</label>
                    <input ttype="number" min="1900" step="1" class="form-control" id="desdeEmpresa" name="desdeEmpresa"
                           required="required"/>
                </div>

                <p>Estado laboral:</p>
                <input type="radio" name="tab" value="igotnone" onclick="show1();"/>
                Desempleado
                <input type="radio" name="tab" value="igottwo" onclick="show2();" checked="checked"/>
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

    echo "wwwwwwwwwwwwwwwwwwwwwwwww";

    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $rbAlumnoEmpresa = $_POST['radio'];

    echo "<span>You have selected :<b> " . $rbAlumnoEmpresa . "</b></span>";

    if ($password == $passwordAgain) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $promoA = $_POST['desdeEmpresa'];

        if ($rbAlumnoEmpresa == "alumno" && $app->getDao()->isConnected()) {
            if ($app->getDao()->addAlumno($username, $password, $name, $surname, $promoA, $email, 1)) {
                echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
            } else {
                echo "<h3>Error en la base de datos.</h3>";
            }
        } elseif ($rbAlumnoEmpresa == "empresa" && $app->getDao()->isConnected()) {


        }


    } else {
        echo "<h3>Error en la conexión.</h3>";
    }


    if (!$app->getDao()->isConnected()) {
        echo "<p>" . $app->getDao()->error . "</p>";
    } elseif ($app->getDao()->addAlumno($username, $password, $name, $surname, $promoA, $email, 1)) {
        echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
    } else {
        echo "<h3>Error en la base de datos.</h3>";
    }
} else {
    echo "<h3>Las contraseñas no coinciden, vuelva a intentarlo.</h3>";
}
}
$app->show_footer();
?>