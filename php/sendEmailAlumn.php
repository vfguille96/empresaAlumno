<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Contactar compañeros/as");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Contactar compañeros/as</h2></p>';
$usuario = $_SESSION['user'];
if (isset($_GET['email']))
    $_SESSION['emailAl'] = $_GET['email'];

$emailAlumn = str_replace(' ', '+', $_SESSION['emailAl']);

?>
    <div class="container">
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <?php

                try {
                    echo " <div class=\"form-group\">
                    <label for=\"email\">Para:    <br></label><p>";
                    echo "<select class=\"selectpicker\" data-width=\"fit\" id='destinatario' name='destinatario[]' disabled>";
                        echo "<option selected>" . $emailAlumn . "</option>";
                    echo "</select>";
                    echo "</div>";
                } catch (Exception $e) {
                    echo "<p>Error interno.</p>";
        }
        ?>

        <div class="form-group">
            <label for="username">Título: </label>
            <input type="text" maxlength="30" class="form-control" id="titulo"
                   placeholder="Título" name="titulo"/>
        </div>
        <div class="form-group">
            <label for="username">Mensaje: </label>
            <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje" rows="5"></textarea>
        </div>

        <p></p>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php

echo '</div>';
$app->show_footer();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];

    if (empty($titulo)){
        echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No se puede enviar un mensaje sin título.
        </div>";

        echo "<script language=\"javascript\">window.location.href=\"searchAlumn.php\"</script>";

    }elseif (empty($mensaje)){
        echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No se puede enviar un mensaje vacío.
        </div>";

        echo "<script language=\"javascript\">window.location.href=\"searchAlumn.php\"</script>";
    }else{
        $remitente = $app->getDao()->getEmailEmpresa($usuario);
        $remitente2 = $remitente->fetch();
        $envioOK =true;
        $tipo = 'empresa';

        $envioOK = $app->getDao()->sendEmail($remitente2[0], $emailAlumn, $titulo, $tipo, $mensaje);

        if ($envioOK){
            echo "<script language=\"javascript\">window.location.href=\"listEmailsEmpresa.php\"</script>";
        }else{
            echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No se ha podido enviar el email correctamente.
        </div>";
            echo "<script language=\"javascript\">window.location.href=\"searchAlumn.php\"</script>";
        }
    }
}

?>