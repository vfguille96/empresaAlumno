<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head_register("Listado de correos");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Listado de correos</h2></p>';
$usuario = $_SESSION['user'];
$resulset = $app->getDao()->getEmailSendedAndReceived($usuario);
$listadoDeCorreosEnviadosYRecibidos = $resulset->fetchAll();
$remitente = $app->getDao()->getEmailAlumno($usuario);
$emailAlumno = $remitente->fetch();

if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
} else {
    // No hay sectores en la dependencia
    if (count($listadoDeCorreosEnviadosYRecibidos) == 0) {
        echo '<p> No hay correos enviados ni recibidos.</p>';
    } else {
        // Hay datos que mostrar
        try {
            ?>
            <table class="table table-bordered table-striped" id='listEmailSR'>

                <thead class="thead-default">
                <tr>
                    <th> idCorreo</th>
                    <th> Fecha</th>
                    <th> Destinatario</th>
                    <th> Tipo</th>
                    <th> Asunto</th>
                </tr>
                </thead>
            <?php
            foreach ($listadoDeCorreosEnviadosYRecibidos as $item) {
                if ($item['remitente'] == $emailAlumno[0] && $item['tipo'] != "empresa") {
                    echo "<tr class=\"table-danger\">";
                    echo "<td><a class=\"btn btn-primary\" href=detailsEmail.php?idCorreo=" . $item['idCorreo'] . ">" . $item['idCorreo'] . "</a></td>";
                    echo "<td> " . $item['fecha'] . "</td>";
                    echo "<td> " . $item['destinatario'] . "</td>";
                    echo "<td> " . strtoupper($item['tipo']) . "</td>";
                    echo "<td> " . $item['asunto'] . "</td>";
                    echo "</tr>";
                } elseif ($item['destinatario'] == $emailAlumno[0] && $item['tipo'] != "empresa") {
                    echo "<tr class=\"table-success\">";
                    echo "<td><a class=\"btn btn-primary\" href=detailsEmail.php?idCorreo=" . $item['idCorreo'] . ">" . $item['idCorreo'] . "</a></td>";
                    echo "<td> " . $item['fecha'] . "</td>";
                    echo "<td> " . $item['destinatario'] . "</td>";
                    echo "<td>  RECIBIDO </td>";
                    echo "<td> " . $item['asunto'] . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr class=\"table-primary\">";
                    echo "<td><a class=\"btn btn-primary\" href=detailsEmail.php?idCorreo=" . $item['idCorreo'] . ">" . $item['idCorreo'] . "</a></td>";
                    echo "<td> " . $item['fecha'] . "</td>";
                    echo "<td> " . $item['destinatario'] . "</td>";
                    echo "<td> " . strtoupper($item['tipo']) . "</td>";
                    echo "<td> " . $item['asunto'] . "</td>";
                    echo "</tr>";
                }
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