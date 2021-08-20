<?php

namespace Controllers;

use MVC\Router;
use Model\Login;

class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            if ($_POST["username"] !== '' && $_POST["password"] !== '') {
                if (
                    preg_match('/^[a-zA-z0-9]+$/', $_POST["username"]) &&
                    preg_match('/^[a-zA-z0-9]+$/', $_POST["password"])
                ) {
                    //variable para las consultas
                    $table = "users";
                    $colum =  "username";
                    $valorColum = $_POST["username"];
                    //conectar y recibir una respuesta del MODEL
                    //trae la fila del user que estoy buscando...
                    $respuesta = Login::MostrarUser($table, $colum, $valorColum);

                    if ($respuesta) {
                        $encritar = password_verify($_POST["password"], $respuesta->password);

                        //comparar el ingreso con la tabla
                        if ($respuesta->username == $_POST["username"] && $encritar) {

                            session_start();
                            $_SESSION["iniciarSesion"] = "ok";
                            $_SESSION['name'] = $respuesta->name;
                            $_SESSION['profile'] = $respuesta->profile;
                            $_SESSION['photo'] = $respuesta->photo;

                            header('Location: /');
                        } else {
                            $errores = ['La contraseña es incorrecta'];
                        }
                    } else {
                        $errores = ['El ususario no existe'];
                    }
                } else {
                    $errores = ['Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9'];
                }
            } else {
                $errores = ['Ingrese datos'];
            }
        }
        // debuguear($errores);

        $router->render('login/entrar', [
            'errores' => $errores,
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
