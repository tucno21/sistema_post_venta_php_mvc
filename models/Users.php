<?php

namespace Model;

class Users extends Template
{

    public static function SaveUser($table, $datos)
    {
        $columns = implode(", ", array_keys($datos));
        $values = implode("', '", array_values($datos));

        $stmt = self::$db->query("INSERT INTO $table ($columns) VALUES ('$values')");

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
