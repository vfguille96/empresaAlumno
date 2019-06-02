<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Detalles del email");
$app->menu();
if (isset($_GET['idCorreo']))
    $idCorreo = $_GET['idCorreo'];
$statement = $app->getDao()->getDetailsEmailID($idCorreo);
$detailsEmail = $statement->fetchAll();

echo '<div class="container">';
echo '<p><h2 class="text-center">Detalles del email ID: ' . $idCorreo . '</h2></p>';

foreach ($detailsEmail as $item) {
    echo "    <div class=\"card text-center\">
    <div class=\"card-header\">
    " . $item['destinatario'] . "
    </div>
    <div class=\"card-body\">
        <h5 class=\"card-title\">" . $item['asunto'] . "</h5>
        <p class=\"card-text\">" . $item['cuerpo'] . "</p>
    </div>
    <div class=\"card-footer text-muted\">
    " . $item['fecha'] . "
    </div>
</div>";

}

?>


