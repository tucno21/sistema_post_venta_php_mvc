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
            }
        }

        $router->render('login/entrar', [
            'errores' => $errors,
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
