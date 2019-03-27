<?php

define("DATABASE", "empresaAlumno");
define("DSN", "mysql:host=localhost;dbname=" . DATABASE);
define("USER", "root");
define("PASSWORD", "123");

define("TABLE_ALUMNOS", "alumnos");
define("COLUMN_ALU_NOMBRE", "nombre");
define("COLUMN_ALU_APELLIDOS", "apellidos");
define("COLUMN_ALU_PROMOCION", "promocion");
define("COLUMN_ALU_EMAIL", "email");
define("COLUMN_ALU_ESTADO", "estado");
define("COLUMN_ALU_NOMBRE_EMPRESA", "nombreEmpresa");
define("COLUMN_ALU_DESDE_EMPRESA", "desdeEmpresa");
define("COLUMN_ALU_USUARIO", "usuario");
define("COLUMN_ALU_CLAVE", "clave");

define("TABLE_EMPRESA", "empresa");
define("COLUMN_EMPRESA_NOMBRE", "nombre");
define("COLUMN_EMPRESA_DIRECCION", "direccion");
define("COLUMN_EMPRESA_TELEFONO", "telefono");
define("COLUMN_EMPRESA_EMAIL", "email");
define("COLUMN_EMPRESA_NOMBRE_CONTACTO", "nombreContacto");
define("COLUMN_EMPRESA_USUARIO", "usuario");
define("COLUMN_EMPRESA_CLAVE", "clave");

define("TABLE_CORREO", "correo");
define("COLUMN_CORREO_IDCORREO", "idCorreo");
define("COLUMN_CORREO_REMITENTE", "remitente");
define("COLUMN_CORREO_DESTINATARIO", "destinatario");
define("COLUMN_CORREO_FECHA", "fecha");
define("COLUMN_CORREO_ASUNTO", "asunto");
define("COLUMN_CORREO_TIPO", "tipo");
define("COLUMN_CORREO_CUERPO", "cuerpo");


class Dao
{

}

?>