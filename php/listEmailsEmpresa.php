<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado correos enviados");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Listado correos enviados</h2></p>';
$usuario = $_SESSION['user'];
$resulset = $app->getDao()->getEmailSendedEmpresa($usuario);
$emails = $resulset->fetchAll();

if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
}
else
{
    // No hay sectores en la dependencia
    if (count($emails) == 0) {
        echo '<p> No hay correos a mostrar.</p>';
    }
    else {
        // Hay datos que mostrar
        try {
            echo "
        
            <table class=\"table table-bordered table-striped\">";

            echo "<thead class=\"thead-default\"> 
            <tr> 
                <th> idCorreo </th>
                    <th> Fecha </th>
                    <th> Destinatario </th>
                    <th> Asunto </th>
            </tr> 
            </thead>";

            foreach ($emails as $item) {
                echo "<tr class=\"table-primary\">";
                echo "<td><a class=\"btn btn-primary\" href=detailsEmail.php?idCorreo=".$item['idCorreo'].">".$item['idCorreo']."</a></td>";
                echo "<td> " .$item['fecha']. "</td>";
                echo "<td> " .$item['destinatario']. "</td>";
                echo "<td> " .$item['asunto']. "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (Exception $e) {
            echo "<p>Error interno.</p>";
        }
    }
}
echo '</div>';
$app->show_footer();
?>