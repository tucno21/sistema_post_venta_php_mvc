<?php

namespace Model;

//creando la clase padre
class ActiveRecord
{
    //base de datos
    protected static $db;
    protected static $columnsDB = [];
    protected static $table = '';

    //errors validacion
    protected static $errors = [];

    //recibe la coneccion a la BD
    public static function setBD($connected)
    {
        self::$db = $connected;
    }

    public static function consultDatabase($query)
    {
        //consultar la base de datos
        $resultado = self::$db->query($query);

        //iterar los datos
        $array = []; //create array para almacenar objetos
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::createObjeto($registro);
        }

        //leberar la memoria
        $resultado->free();

        //retorar los resultados
        return  $array;
    }



    //subida de archivos
    public function setImage($imagen)
    {
        if (!is_null($this->id)) {
            //comprobar si existe el archivo
            $this->deleteImage();
        }

        //asignar al atributo el nombre de la imagen
        if ($imagen) {
            $this->photo = $imagen;
        }
    }

    public function setPasswordHash($pass)
    {
        //asignar al atributo el nombre de la imagen
        if ($pass) {
            $this->password = $pass;
        }
    }

    public function deleteImage()
    {
        $existeAchivo = file_exists(CARPETA_IMAGENES . $this->photo);
        if ($existeAchivo) {
            unlink(CARPETA_IMAGENES . $this->photo);
        }
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //update
            $this->update();
        } else {
            //create nuevo registro
            $this->create();
        }
    }

    public function create()
    {
        //Limpiar los datos del IMPUT 
        $atributos = $this->sanitizarDatos();

        //insertar NUEVO a la base de datos
        $query = " INSERT INTO " . static::$table . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUE (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        // debuguear($resultado);
        // if ($resultado) {
        //     header('Location: /usuarios');
        // }
    }

    public function update()
    {
        //Limpiar los datos del IMPUT
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        //update a la base de datos
        $query = " UPDATE " . static::$table . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        // debuguear($query);

        $resultado = self::$db->query($query);
    }

    public function delete()
    {
        $query = "DELETE FROM " . static::$table . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->deleteImage();
        }
    }

    //iterar la columanasDB //identidicar y unir los atibutos en la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnsDB as $columna) {
            if ($columna === "id") continue; //con esto no tomamo en cuenta el id
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //validacion
    public static function getErrors()
    {
        return static::$errors;
    }

    public function validar()
    {
        static::$errors = [];
        return static::$errors;
    }

    //traer todas las propiedades de la table
    public static function all()
    {
        $query = "SELECT * FROM " . static::$table; //static hereda clase HIJO
        $resultado = self::consultDatabase($query);

        return $resultado;
        // debuguear($resultado);
    }

    //obtiene determinado numero de registro para pagina principal index
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$table . " LIMIT " . $cantidad; //static hereda clase HIJO
        $resultado = self::consultDatabase($query);

        return $resultado;
        // debuguear($resultado);
    }

    //bsucar una propiedad o registro por si id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id=${id}";

        $resultado = self::consultDatabase($query);
        return array_shift($resultado);
    }



    protected static function createObjeto($registro)
    {
        $objeto = new static; //este crea array vacio de las pripiedades de las clases hijas

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
