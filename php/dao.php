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
    private $conn;
    public $error;

    function __construct()
    {
        try {
            $this->conn = new PDO(DSN, USER, PASSWORD);

        } catch (PDOException $e) {
            $this->error = "Error en la conexión " . $e->getMessage();
        }
    }

    function isConnected()
    {
        return isset($this->conn);
    }

    function validateAlumno($usuario, $clave)
    {
        $sql = "SELECT * FROM " . TABLE_ALUMNOS . " WHERE " . COLUMN_ALU_USUARIO . "='" . $usuario . "' AND " . COLUMN_ALU_CLAVE . "=sha1('" . $clave . "')";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function validateEmpresa($usuario, $clave)
    {
        $sql = "SELECT * FROM " . TABLE_EMPRESA . " WHERE " . COLUMN_EMPRESA_USUARIO . "='" . $usuario . "' AND " . COLUMN_EMPRESA_CLAVE . "=sha1('" . $clave . "')";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function addAlumno($usuario, $clave, $nombre, $apellidos, $promocion, $email, $estado)
    {
        try {
            if ($this->validateAlumno($usuario, $clave)) {
                echo '<h3>ERROR: Ya existe un usuario en la base de datos.</h3>';
                return false;
            } else {
                $sql = "INSERT INTO `" . TABLE_ALUMNOS . "` (`" . COLUMN_ALU_USUARIO . "`, `" . COLUMN_ALU_CLAVE . "`, `" . COLUMN_ALU_NOMBRE . "`, `" . COLUMN_ALU_APELLIDOS . "`, `" . COLUMN_ALU_PROMOCION . "`, `" . COLUMN_ALU_EMAIL . "`, `" . COLUMN_ALU_ESTADO . "`) VALUES ('" . $usuario . "', '" . sha1($clave) . "', '" . $nombre . "', '" . $apellidos . "', '" . $promocion . "' , '" . $email . "', '" . $estado . "')";
                $this->conn->exec($sql);
                if ($this->validateAlumno($usuario, $clave)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            $this->error = "Error: " . $this->$e->getMessage();
            echo $this->error;
            return false;
        }
    }

    function addAlumnoNombreEmpresa($usuario, $clave, $nombre, $apellidos, $promocion, $email, $estado, $nombreEmpresa, $desdeEmpresa)
    {
        try {
            if ($this->validateAlumno($usuario, $clave)) {
                echo '<h3>ERROR: Ya existe un usuario en la base de datos.</h3>';
                return false;
            } else {
                $sql = "INSERT INTO `" . TABLE_ALUMNOS . "` (`" . COLUMN_ALU_USUARIO . "`, `" . COLUMN_ALU_CLAVE . "`, `" . COLUMN_ALU_NOMBRE . "`, `" . COLUMN_ALU_APELLIDOS . "`, `" . COLUMN_ALU_PROMOCION . "`, `" . COLUMN_ALU_EMAIL . "`, `" . COLUMN_ALU_ESTADO . "`, `" . COLUMN_ALU_NOMBRE_EMPRESA . "`, `" . COLUMN_ALU_DESDE_EMPRESA . "`) VALUES ('" . $usuario . "', '" . sha1($clave) . "', '" . $nombre . "', '" . $apellidos . "', '" . $promocion . "' , '" . $email . "', '" . $estado . "', '" . $nombreEmpresa . "', '" . $desdeEmpresa . "')";
                $this->conn->exec($sql);
                if ($this->validateAlumno($usuario, $clave)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            $this->error = "Error: " . $this->$e->getMessage();
            echo $this->error;
            return false;
        }
    }

    function addEmpresa($usuario, $clave, $nombreContacto, $email, $telefono, $direccion, $nombre)
    {
        try {
            if ($this->validateEmpresa($usuario, $clave)) {
                echo '<h3>ERROR: Ya existe un usuario en la base de datos.</h3>';
                return false;
            } else {
                $sql = "INSERT INTO `" . TABLE_EMPRESA . "` (`" . COLUMN_EMPRESA_NOMBRE . "`, `" . COLUMN_EMPRESA_DIRECCION . "`, `" . COLUMN_EMPRESA_TELEFONO . "`, `" . COLUMN_EMPRESA_EMAIL . "`, `" . COLUMN_EMPRESA_NOMBRE_CONTACTO . "`, `" . COLUMN_EMPRESA_USUARIO . "`, `" . COLUMN_EMPRESA_CLAVE . "`) VALUES ('" . $nombre . "', '" . $direccion . "', '" . $telefono . "' , '" . $email . "', '" . $nombreContacto . "', '" . $usuario . "', '" . sha1($clave) . "')";
                $this->conn->exec($sql);
                if ($this->validateEmpresa($usuario, $clave)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            $this->error = "Error: " . $this->$e->getMessage();
            echo $this->error;
            return false;
        }
    }

    function validateUserE($user, $password)
    {
        $sql = "SELECT * FROM " . TABLE_EMPRESA . " WHERE " . COLUMN_EMPRESA_USUARIO . "='" . $user . "' AND " . COLUMN_EMPRESA_CLAVE . "=sha1('" . $password . "')";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function validateUserA($user, $password)
    {
        $sql = "SELECT * FROM " . TABLE_ALUMNOS . " WHERE " . COLUMN_ALU_USUARIO . "='" . $user . "' AND " . COLUMN_ALU_CLAVE . "=sha1('" . $password . "')";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function getEmpresas()
    {
        try {
            $sql = "select " . COLUMN_EMPRESA_NOMBRE . ", " . COLUMN_EMPRESA_DIRECCION . " from " . TABLE_EMPRESA;
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getNombreApellidosEmailAlumnos()
    {
        try {
            $sql = "select " . COLUMN_ALU_NOMBRE . ", " . COLUMN_ALU_APELLIDOS . ", " . COLUMN_ALU_EMAIL . " from " . TABLE_ALUMNOS;
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function checkUserAlumno($user)
    {
        $sql = "SELECT * FROM " . TABLE_ALUMNOS . " WHERE " . COLUMN_ALU_USUARIO . "='" . $user . "'";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function checkUserEmpresa($user)
    {
        $sql = "SELECT * FROM " . TABLE_EMPRESA . " WHERE " . COLUMN_EMPRESA_USUARIO . "='" . $user . "'";
        // Ejecutar la sentencia del objeto PDO
        $statement = $this->conn->query($sql);
        if ($statement->rowCount() == 1)
            return true;
        else
            return false;
    }

    function sendEmail($remitente1, $destinatario1, $titulo1, $tipo1, $mensaje1)
    {
        try {
            $sql = $this->conn->prepare("call sendEmail(?, ?, ?, ?, ?)");
            $sql->bindParam(1, $remitente1);
            $sql->bindParam(2, $destinatario1);
            $sql->bindParam(3, $titulo1);
            $sql->bindParam(4, $tipo1);
            $sql->bindParam(5, $mensaje1);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = "Error: " . $this->$e->getMessage();
            echo $this->error;
            return false;
        }
    }

    function getEmailAlumno($username)
    {
        try {
            $sql = "select " . COLUMN_ALU_EMAIL . " from " . TABLE_ALUMNOS . " where usuario = '" . $username . "'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getEmailEmpresa($username)
    {
        try {
            $sql = "select " . COLUMN_ALU_EMAIL . " from " . TABLE_EMPRESA . " where usuario = '" . $username . "'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getEmailSended($username)
    {
        try {
            $sql = "select " . COLUMN_CORREO_IDCORREO . ", " . COLUMN_CORREO_FECHA . ", " . COLUMN_CORREO_DESTINATARIO . ", " . COLUMN_CORREO_ASUNTO .", " . COLUMN_CORREO_CUERPO ." from " . TABLE_CORREO." where ".COLUMN_CORREO_REMITENTE." = (select ".COLUMN_ALU_EMAIL." from ".TABLE_ALUMNOS." where usuario = '". $username."')";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getEmailSendedAndReceived($username)
    {
        try {
            $sql = "select " . COLUMN_CORREO_IDCORREO . ", " . COLUMN_CORREO_FECHA . ", " . COLUMN_CORREO_REMITENTE .", " . COLUMN_CORREO_DESTINATARIO . ", " . COLUMN_CORREO_TIPO .", " . COLUMN_CORREO_ASUNTO ." from " . TABLE_CORREO." where ".COLUMN_CORREO_DESTINATARIO." = (select ".COLUMN_ALU_EMAIL." from ".TABLE_ALUMNOS." where usuario = '". $username."') or ".COLUMN_CORREO_REMITENTE." = (select ".COLUMN_ALU_EMAIL." from ".TABLE_ALUMNOS." where usuario = '". $username."')";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getDetailsEmailID($idCorreo)
    {
        try {
            $sql = "select " . COLUMN_CORREO_FECHA . ", " . COLUMN_CORREO_ASUNTO . ", " . COLUMN_CORREO_DESTINATARIO . ", " . COLUMN_CORREO_CUERPO ." from " . TABLE_CORREO. " where idCorreo = " .$idCorreo;
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getEmailSendedEmpresa($username)
    {
        try {
            $sql = "select " . COLUMN_CORREO_IDCORREO . ", " . COLUMN_CORREO_FECHA . ", " . COLUMN_CORREO_DESTINATARIO . ", " . COLUMN_CORREO_ASUNTO ." from " . TABLE_CORREO." where ".COLUMN_CORREO_REMITENTE." = (select ".COLUMN_EMPRESA_EMAIL." from ".TABLE_EMPRESA." where usuario = '". $username."')";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getInfoAlumnosEmpresa($apellidos, $promocion)
    {
        try {
            $sql = "select " . COLUMN_ALU_NOMBRE . ", " . COLUMN_ALU_APELLIDOS . ", " . COLUMN_ALU_PROMOCION . ", ". COLUMN_ALU_EMAIL . " from " . TABLE_ALUMNOS. " where ".COLUMN_ALU_APELLIDOS." like '%".$apellidos."%' and ".COLUMN_ALU_PROMOCION." = '".$promocion."'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getInfoAlumnosEmpresaApellidos($apellidos)
    {
        try {
            $sql = "select " . COLUMN_ALU_NOMBRE . ", " . COLUMN_ALU_APELLIDOS . ", " . COLUMN_ALU_PROMOCION . ", ". COLUMN_ALU_EMAIL . " from " . TABLE_ALUMNOS. " where ".COLUMN_ALU_APELLIDOS." like '%".$apellidos."%'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    function getInfoAlumnosEmpresaPromo($promocion)
    {
        try {
            $sql = "select " . COLUMN_ALU_NOMBRE . ", " . COLUMN_ALU_APELLIDOS . ", " . COLUMN_ALU_PROMOCION . ", ". COLUMN_ALU_EMAIL . " from " . TABLE_ALUMNOS. " where ". COLUMN_ALU_PROMOCION." = '".$promocion."'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }
    }
}

?>