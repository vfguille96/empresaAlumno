<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado empresas");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Listado de empresas</h2></p>';
$resulset = $app->getDao()->getNombreApellidosEmailAlumnos();
$nombreApellidosEmail = $resulset->fetchAll();

if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
} else {
    // No hay sectores en la dependencia
    if (count($nombreApellidosEmail) == 0) {
        echo '<p> No hay alumnos registrados.</p>';
    } else {
        // Hay datos que mostrar
        try {
            echo "<select class=\"selectpicker\" multiple data-actions-box=\"true\">";
            foreach ($nombreApellidosEmail as $item) {
                echo "<option data-subtext=" . $item['nombre'] .">" . $item['email'] . "</option>";

            }
            echo "</select>";
        } catch (Exception $e) {
            echo "<p>Error interno.</p>";
        }
    }
}


echo '</div>';
$app->show_footer();

/*<select class="selectpicker" multiple data-actions-box="true">
<option data-subtext="Heinz">Ketchup</option>
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Relish</option>
</select>*/
?>