<?php

namespace Controllers;

use MVC\Router;

class UserController
{
    public static function index(Router $router)
    {

        $router->render('usuarios/index');
    }
}
