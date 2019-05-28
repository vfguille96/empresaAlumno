<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Buscar alumnos/as");
$app->menu();
echo '<div class="container">';
echo '<p><h2 class="text-center">Buscar alumnos/as</h2></p>';
?>


<div class="container">
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">
            <label for="username">Apellidos: </label>
            <input type="text" maxlength="30" class="form-control" id="titulo"
                   placeholder="Apellidos" name="apellidos"/>
        </div>
        <div class="form-group">
            <label for="promo">Año de la promoción:</label>
            <input type="number" min="1900" step="1" class="form-control" id="promocion" name="promocion"
            />
        </div>

        <p></p>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Buscar</button><br><br>
        </div>
    </form>


<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $promocion = $_POST['promocion'];
    $apellidos = $_POST['apellidos'];

    if (empty($apellidos) && !empty($promocion)){
        $resulset = $app->getDao()->getInfoAlumnosEmpresaPromo($promocion);
        $nombreApellidosEmail = $resulset->fetchAll();

        if (!$resulset) {
            echo '<p>Error en la base de datos</p>';
        }
        else
        {
            // No hay sectores en la dependencia
            if (count($nombreApellidosEmail) == 0) {
                echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No hay alumnos a mostrar.
        </div>";
            }
            else {
                // Hay datos que mostrar
                try {
                    echo "
            <table class=\"table table-bordered table-striped\">";

                    echo "<thead class=\"thead-default\"> 
            <tr> 
                <th> Nombre </th>
                    <th> Apellidos </th>
                    <th> Promoción </th>
                    <th> Email </th>
            </tr> 
            </thead>";

                    foreach ($nombreApellidosEmail as $item) {
                        echo "<tr class=\"table-primary\">";
                            echo "<td> " .$item['nombre']. "</td>";
                            echo "<td> " .$item['apellidos']. "</td>";
                            echo "<td> " .$item['promocion']. "</td>";
                            echo "<td><a class=\"btn btn-primary\" href=sendEmailAlumn.php?email=".$item['email'].">".$item['email']."</a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
                catch (Exception $e) {
                    echo "<p>Error interno.</p>";
                }
            }
        }


    }elseif (empty($promocion) && !empty($apellidos)){
        $resulset = $app->getDao()->getInfoAlumnosEmpresaApellidos($apellidos);
        $nombreApellidosEmail = $resulset->fetchAll();

        if (!$resulset) {
            echo '<p>Error en la base de datos</p>';
        }
        else
        {
            // No hay sectores en la dependencia
            if (count($nombreApellidosEmail) == 0) {
                echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No hay alumnos a mostrar.
        </div>";
            }
            else {
                // Hay datos que mostrar
                try {
                    echo "
            <table class=\"table table-bordered table-striped\">";

                    echo "<thead class=\"thead-default\"> 
            <tr> 
                <th> Nombre </th>
                    <th> Apellidos </th>
                    <th> Promoción </th>
                    <th> Email </th>
            </tr> 
            </thead>";

                    foreach ($nombreApellidosEmail as $item) {
                        echo "<tr class=\"table-primary\">";
                        echo "<td> " .$item['nombre']. "</td>";
                        echo "<td> " .$item['apellidos']. "</td>";
                        echo "<td> " .$item['promocion']. "</td>";
                        echo "<td><a class=\"btn btn-primary\" href=sendEmailAlumn.php?email=".$item['email'].">".$item['email']."</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                catch (Exception $e) {
                    echo "<p>Error interno.</p>";
                }
            }
        }


    }
    elseif (!empty($promocion) && !empty($apellidos)){
        $resulset = $app->getDao()->getInfoAlumnosEmpresa($apellidos, $promocion);
        $nombreApellidosEmail = $resulset->fetchAll();

        if (!$resulset) {
            echo '<p>Error en la base de datos</p>';
        }
        else
        {
            // No hay sectores en la dependencia
            if (count($nombreApellidosEmail) == 0) {
                echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            No hay alumnos a mostrar.
        </div>";
            }
            else {
                // Hay datos que mostrar
                try {
                    echo "
            <table class=\"table table-bordered table-striped\">";

                    echo "<thead class=\"thead-default\"> 
            <tr> 
                <th> Nombre </th>
                    <th> Apellidos </th>
                    <th> Promoción </th>
                    <th> Email </th>
            </tr> 
            </thead>";

                    foreach ($nombreApellidosEmail as $item) {
                        echo "<tr class=\"table-primary\">";
                        echo "<td> " .$item['nombre']. "</td>";
                        echo "<td> " .$item['apellidos']. "</td>";
                        echo "<td> " .$item['promocion']. "</td>";
                        echo "<td><a class=\"btn btn-primary\" href=sendEmailAlumn.php?email=".$item['email'].">".$item['email']."</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                catch (Exception $e) {
                    echo "<p>Error interno.</p>";
                }
            }
        }
    } else{
        echo "</br><div class=\"alert alert-danger\" role=\"alert\">
            Inserte algún parámetro de búsqueda.
        </div>";
    }
}
echo '</div>';
$app->show_footer();
?>