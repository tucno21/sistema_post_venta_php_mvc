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
    public static function FindColumn($colum, $valorColum)
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

    public static function All()
    {
        $query = "SELECT * FROM " . static::$table;

        $stmt = self::$db->query($query);
        //Pasar todos los datos a arreglo asociativo
        $resultadato = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        //convertir el arreglo a objeto
        $mi_objeto = json_decode(json_encode($resultadato));
        // debuguear($mi_objeto);

        //enviar objeto de la respuesta
        return $mi_objeto;

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
