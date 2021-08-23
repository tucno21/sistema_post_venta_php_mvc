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

    //recibe los datos de controller
    public static function find($id)
    {
        $colum = "id";
        $query = "SELECT * FROM " . static::$table . " WHERE $colum = '$id'";
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

    public static function Save($datos)
    {
        $columns = implode(", ", array_keys($datos));
        $values = implode("', '", array_values($datos));

        $query = "INSERT INTO " . static::$table . "($columns) VALUES ('$values')";
        $stmt = self::$db->query($query);

        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }

    //recibe los datos de controller
    public static function update($datos, $id)
    {
        $valores = [];
        foreach ($datos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $columValue = join(', ', $valores);

        $query = "UPDATE " . static::$table . " SET $columValue WHERE id= '$id'";
        // debuguear($query);

        $stmt = self::$db->query($query);

        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
