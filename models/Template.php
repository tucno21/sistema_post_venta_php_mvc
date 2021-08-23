<?php

namespace Model;

class Template
{
    protected static $db;

    protected static $table = '';

    //recibe la coneccion a la BD
    public static function setBD($connected)
    {
        self::$db = $connected;
    }

    //buscar un dato por columna
    public static function MostrarUser($colum, $valorColum)
    {

        $query = "SELECT * FROM " . static::$table . " WHERE $colum = '$valorColum'";
        $stmt = self::$db->query($query);

        //enviar objeto de la respuesta
        return $stmt->fetch_object();

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
