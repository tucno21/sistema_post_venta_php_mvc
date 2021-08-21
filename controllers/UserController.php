<?php

namespace Controllers;

use MVC\Router;
use Model\Users;
//llamar a la imagen
use Intervention\Image\ImageManagerStatic as Imagex;

class UserController
{
    public static function index(Router $router)
    {


        $router->render('usuarios/index', []);
    }

    public static function crear(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!$_POST['user']['name']) {
                array_push($errores, "El nombre es obligatorio");
            }
            if (!$_POST['user']['username']) {
                array_push($errores, "El usuario es obligatorio");
            }
            if (!$_POST['user']['password']) {
                array_push($errores, "La contraseña es obligatorio");
            }
            if (!$_POST['user']['profile']) {
                array_push($errores, "La categoria es obligatorio");
            }
            if (!$_FILES['user']['tmp_name']['photo']) {
                array_push($errores, "La foto es obligatorio");
            }
            if (
                preg_match('/^[a-zA-z0-9]+$/', $_POST['user']['name']) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST['user']['username']) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST['user']['password'])
            ) {
                $password = $_POST['user']['password'];
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $_POST['user']['password'] = $passwordHash;

                //generar nombre unico para la imagen
                $nameImage = md5(uniqid(rand(), true)) . '.jpg';

                if ($_FILES['user']['tmp_name']['photo']) {
                    //modificar imagen
                    $image = Imagex::make($_FILES['user']['tmp_name']['photo'])->fit(800, 600);
                    //agregar al array
                    $_POST['user']['photo'] = $nameImage;
                }
                $_POST['user']['estado'] = 1;
                $_POST['user']['last_login'] = date('Y-m-d');
                $_POST['user']['registration_date'] = date('Y-m-d');

                if (empty($errores)) {
                    if (!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }
                    $user = $_POST['user'];
                    $table = "users";
                    $respuesta = Users::SaveUser($table, $user);

                    $image->save(CARPETA_IMAGENES . $nameImage);

                    if ($respuesta == "ok") {
                        header('Location: /usuarios');
                    }
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

        $router->render('usuarios/crear', [
            'errores' => $errores,
        ]);
    }
}
