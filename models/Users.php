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

    public static function AllUsers()
    {

        $table = "users";

        $stmt = self::$db->query("SELECT * FROM $table");
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

    //recibe los datos de controller
    public static function find($id)
    {
        $table = "users";
        $colum = "id";

        $stmt = self::$db->query("SELECT * FROM $table WHERE $colum = '$id'");

        //enviar objeto de la respuesta
        return $stmt->fetch_object();

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }

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
}
