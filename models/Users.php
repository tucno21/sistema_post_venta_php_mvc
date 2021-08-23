<?php

namespace Model;

class Users extends Template
{
    protected static $table = 'users';

    //recibe los datos de controller
    public static function update($datos, $id)
    {
        $table = "users";

        $valores = [];
        foreach ($datos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $columValue = join(', ', $valores);

        $query = "UPDATE $table SET $columValue WHERE id= '$id'";
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

    public static function delete($id)
    {
        $table = "users";

        $query = "DELETE FROM $table WHERE id='$id'";

        $stmt = self::$db->query($query);

        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }
    }
}
