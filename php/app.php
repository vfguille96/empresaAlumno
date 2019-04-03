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

    function show_head($titulo)
    {
        print " <!DOCTYPE html>
        <html lang=\"es\">
            <head>
                <meta charset=\"utf-8\"/>
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <title>" . $titulo . "</title>
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\">
                <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js\"></script>
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\"></script>
            </head>
            <body>
            ";

    }

    function show_footer()
    {
        print "
    </body>
    </html>
    ";
    }
}

?>