<?php
include_once 'app.php';
$app = new App();
$app->validateSession();
$app->show_head("Inicio");
$app->menu();
$username = $_SESSION['user'];
echo '</br>';
echo '<h2 class="text-center">Bienvenido, ' . $username . '.</h2>';

if ($app->getDao()->checkUserAlumno($username)){
    echo "</br>
<div class=\"row justify-content-center\">
    <div class=\"col-sm-5\">
        <div class=\"card\">
            <h5 class=\"card-header\">Contactar compañeros/as</h5>
            <div class=\"card-body\">
                <p class=\"card-text\">Listado de exalumnos/as del centro donde se podrá contactar con ellos/as.</p>
                <a href=\"contactAlumn.php\" class=\"btn btn-primary\">Contactar</a>
            </div>
        </div>
    </div>

    <div class=\"col-sm-5\">
        <div class=\"card\">
            <h5 class=\"card-header\">Listado de correos</h5>
            <div class=\"card-body\">
                <p class=\"card-text\">Se muestran los correos enviados y recibidos.</p>
                <a href=\"listEmail.php\" class=\"btn btn-primary\">Listar</a>
            </div>
        </div>
    </div>

</div>
</br>
<div class=\"row justify-content-center\">
    <div class=\"col-sm-5\">
        <div class=\"card\">
            <h5 class=\"card-header\">Listado de empresas</h5>
            <div class=\"card-body\">
                <p class=\"card-text\">Se muestran las empresas dadas de alta y dirección.</p>
                <a href=\"listEmpresas.php\" class=\"btn btn-primary\">Buscar</a>
            </div>
        </div>
    </div>
</div>";
}

if ($app->getDao()->checkUserEmpresa($username)){
    echo "<!-- EMPRESA -->
</br>
<div class=\"row justify-content-center\">
    <div class=\"col-sm-5\">
        <div class=\"card\">
            <h5 class=\"card-header\">Listar correos empresa</h5>
            <div class=\"card-body\">
                <p class=\"card-text\">Se mostrarán todos los correos que la empresa ha enviado.</p>
                <a href=\"listEmailsEmpresa.php\" class=\"btn btn-primary\">Listar</a>
            </div>
        </div>
    </div>

    <div class=\"col-sm-5\">
        <div class=\"card\">
            <h5 class=\"card-header\">Buscar alumnos/as</h5>
            <div class=\"card-body\">
                <p class=\"card-text\">Se filtrará los alumnos por nombre, apellidos y año de promoción.</p>
                <a href=\"#\" class=\"btn btn-primary\">Buscar</a>
            </div>
        </div>
    </div>
</div>
</br>";
}


?>



