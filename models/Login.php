<?php

namespace Model;
// require_once "Conexion.php";

class Login
{
    protected static $db;

    //recibe la coneccion a la BD
    public static function setBD($connected)
    {
        self::$db = $connected;
    }

    //recibe los datos de controller
    public static function MostrarUser($table, $colum, $valorColum)
    {

        $stmt = self::$db->query("SELECT * FROM $table WHERE $colum = '$valorColum'");

        //enviar objeto de la respuesta
        return $stmt->fetch_object();

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
