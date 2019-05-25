<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Listado empresas");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Listado de empresas</h2></p>';
$resulset = $app->getDao()->getEmpresas();
$empresas = $resulset->fetchAll();

if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
}
else
{
    // No hay sectores en la dependencia
    if (count($empresas) == 0) {
        echo '<p> No hay empresas registradas.</p>';
    }
    else {
        // Hay datos que mostrar
        try {
            echo "
        
            <table class=\"table table-bordered table-striped\">";

            echo "<thead class=\"thead-default\"> 
            <tr> 
                <th> Nombre </th> 
                <th> Dirección </th> 
            </tr> 
            </thead>";

            foreach ($empresas as $item) {
                echo "<tr> <td> " .$item['nombre']. "</td>";
                echo " <td> " .$item['direccion']. "</td></tr>";
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