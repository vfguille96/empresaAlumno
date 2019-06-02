<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head_register("Listado de correos enviados");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Listado de correos enviados</h2></p>';
$usuario = $_SESSION['user'];
$resulset = $app->getDao()->getEmailSended($usuario);
$listadoDeCorreosEnviados = $resulset->fetchAll();

if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
} else {
    // No hay sectores en la dependencia
    if (count($listadoDeCorreosEnviados) == 0) {
        echo '<p> No hay correos enviados.</p>';
    } else {
        // Hay datos que mostrar
        try {
            ?>
            <input type="radio" name="radio" onclick="showMensaje();" checked="checked"/>
            Visible

            <input type="radio" name="radio" onclick="hideMensaje();"/>
            No visible


            <table class="table table-bordered table-striped" id='listEmailS'>

                <thead class="thead-default">
                <tr>
                    <th> idCorreo</th>
                    <th> Fecha</th>
                    <th> Destinatario</th>
                    <th> Asunto</th>
                    <th id="div3" class="hide"> Mensaje</th>
                </tr>
                </thead>
            <?php
            foreach ($listadoDeCorreosEnviados as $item) {
                echo "<tr>";
                echo "<td> " . $item['idCorreo'] . "</td>";
                echo "<td> " . $item['fecha'] . "</td>";
                echo "<td> " . $item['destinatario'] . "</td>";
                echo "<td> " . $item['asunto'] . "</td>";
                echo "<div id=\"div3\" class=\"hide\"><td> " . $item['cuerpo'] . "</td></div>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (Exception $e) {
            echo "<p>Error interno.</p>";
        }
    }
}
echo '</div>';
$app->show_footer();
?>