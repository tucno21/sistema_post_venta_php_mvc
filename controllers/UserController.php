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
}
