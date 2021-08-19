<?php

namespace Model;

class Login extends ActiveRecord
{
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'username', 'password', 'profile'];

    public $id;
    public $username;
    public $password;
    public $profile;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->profile = $args['profile'] ?? '';
    }

    public function validar()
    {
        //verificar que los imput no este vacio y envia al arreglo errors
        if (!$this->username) {
            self::$errors[] = "El username es obligatorio o no es valido";
        }
        if (!$this->password) {
            self::$errors[] = "El password es obligatorio";
        }
        return self::$errors;
    }

    public function existeUsuario()
    {
        //revisar si el usario existe o no es
        $query = "SELECT * FROM " . self::$table . " WHERE username = '" . $this->username . "' LIMIT 1";
        $resultado = self::$db->query($query);
        // debuguear($resultado);

        if (!$resultado->num_rows) {
            self::$errors[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object(); //trae al usuario con su contraseña

        $auth = password_verify($this->password, $usuario->password);

        if (!$auth) {
            self::$errors[] = 'La contraseña es incorrecta';
            return;
        }
        return $auth;
    }

    public function autenticarAlUsuario()
    {
        session_start();
        $_SESSION['usuario'] = "ok";
        // $_SESSION['login'] = true; //se puede colorcar cualquier valor
        header('Location: /');
    }
}
