<?php

namespace Controllers;

use MVC\Router;
use Model\Users;

class UserController
{
    public static function index(Router $router)
    {
        $users = Users::all();

        $router->render('usuarios/index', [
            'users' => $users,
        ]);
    }

    public static function crear(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $user = new Users($_POST['user']);

        }
        $router->render('usuarios/crear', []);
    }
}
