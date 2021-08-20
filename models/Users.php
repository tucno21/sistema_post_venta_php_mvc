<?php

namespace Model;

class Users extends ActiveRecord
{
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'name', 'username', 'password', 'profile', 'photo', 'estado', 'last_login', 'registration_date'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->profile = $args['profile'] ?? '';
        $this->photo = $args['photo'] ?? '';
        $this->estado = $args['estado'] ?? '1';
        $this->last_login = date('Y-m-d');
        $this->registration_date = date('Y-m-d');
    }

    public function validar()
    {
        //verificar que los imput no este vacio y envia al arreglo errores
        if (!$this->name) {
            self::$errors[] = "El nombre es obligatorio";
        }
        if (!$this->username) {
            self::$errors[] = "EL usuario es obligatorio";
        }
        if (!$this->password) {
            self::$errors[] = "se requiere una contraseña";
        }
        if (!$this->profile) {
            self::$errors[] = "se requiere el tipo de ususario";
        }

        return self::$errors;
    }
}
