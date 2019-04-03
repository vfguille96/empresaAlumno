<?php
include_once 'app.php';
session_start();
(new App)->show_head("Inicio de sesión");
(new App)->show_footer();
?>