<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Contactar compañeros/as");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Contactar compañeros/as</h2></p>';
$resulset = $app->getDao()->getNombreApellidosEmailAlumnos();
$nombreApellidosEmail = $resulset->fetchAll();

?>
    <div class="container">
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <?php
        if (!$resulset) {
            echo '<p>Error en la base de datos</p>';
        } else {
            // No hay sectores en la dependencia
            if (count($nombreApellidosEmail) == 0) {
                echo '<p> No hay alumnos registrados.</p>';
            } else {
                // Hay datos que mostrar
                try {
                    echo " <div class=\"form-group\">
                    <label for=\"email\">Para: </label>";
                    echo "<select class=\"selectpicker\" multiple data-actions-box=\"true\" data-width=\"fit\" id='destinatario' name='destinatario[]'>";
                    foreach ($nombreApellidosEmail as $item) {
                        echo "<option data-subtext=" . $item['nombre'] . '&nbsp;' . $item['apellidos'] . ">" . $item['email'] . "</option>";
                    }
                    echo "</select>";
                    echo "</div>";
                } catch (Exception $e) {
                    echo "<p>Error interno.</p>";
                }
            }
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

    if (!isset($_POST['destinatario'])){
        echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No se ha seleccionado ningún destinatario.
        </div>";
    }else
        $destinatarios = $_POST['destinatario'];


    $titulo = $_POST['titulo'];
    $mensaje = $_POST['mensaje'];







}

?>