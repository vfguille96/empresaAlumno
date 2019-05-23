<?php
include_once 'dao.php';

class App
{
    protected $dao;

    function __construct()
    {
        $this->dao = new Dao();
    }

    function getDao()
    {
        return $this->dao;
    }

    /**
     * Función que guarda el nombre de usuario en la variable $SESSION
     * cuando el usuario se ha logueado (login.php)
     */
    function init_session($user)
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = $user;
        }
    }

    function show_head($titulo)
    {
        print " <!DOCTYPE html>
        <html lang=\"es\">
            <br>
                <meta charset=\"utf-8\"/>
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                </br><title>" . $titulo . "</title>
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\">
                <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js\"></script>
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\"></script>
                <script src=\"../js/displayForm.js\"></script>
            </head>
            <body>
            ";

    }

    function show_head_register($titulo)
    {
        print " <!DOCTYPE html>
        <html lang=\"es\">
            <head class='bg-primary'>
                <meta charset=\"utf-8\"/>
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                </br><title>" . $titulo . "</title>
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\">
                <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js\"></script>
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\"></script>
                <script src=\"../js/displayForm.js\"></script>
                <script type=\"text/javascript\">
        function hideOne() {
            document.getElementById('div3').style.display = 'none';
        }
        window.onload = hideOne;
        </script>
            </head>
            <body>
            ";

    }

    function menu()
    {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="home.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Aulas
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="aulas.php">Buscar Aulas</a>
          </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Reservas
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="listarReservas.php">Listar reservas</a>
        <a class="dropdown-item" href="reservar.php">Reservar aula</a>
        </div>
      </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <form action="logout.php">
          <input type="submit" value="Cerrar sesión" class="btn btn-primary pull-right"/>
          </form>
          
          </ul>
        </div>
      </nav>';
    }

    function show_footer()
    {
        print "
    </body>
    </html>
    ";
    }

    function menu_register()
    {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-primary ">
            <a class="navbar-brand text-light" href="login.php">Inicio de sesión</a>
        </nav>';
    }
}

?>