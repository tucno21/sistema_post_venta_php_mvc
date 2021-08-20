<?php

namespace Controllers;

use MVC\Router;
use Model\Login;

class LoginController
{
    public static function login(Router $router)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = new Login($_POST);

            $errors = $login->validar();


            if (empty($errors)) {
                //revisar si el usuario existente
                $resultado = $login->existeUsuario();
                // $usuario = $resultado->fetch_object();
                // debuguear($user);

                if (!$resultado) {
                    $errors = Login::getErrors();
                } else {
                    //revisar si la contraseña es correcto
                    $autenticado = $login->comprobarPassword($resultado);

                    if ($autenticado) {
                        //el usuario esta autenticado
                        $login->autenticarAlUsuario();
                    } else {
                        $errors = Login::getErrors();
                    }
                }
                // $usuario = $resultado->fetch_object();
            }
        }

        $router->render('login/entrar', [
            'errores' => $errors,
            'usuario' => $usuario,
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
