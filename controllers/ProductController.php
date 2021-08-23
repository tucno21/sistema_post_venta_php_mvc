<?php

namespace Controllers;

use MVC\Router;

class ProductController
{
    public static function index(Router $router)
    {

        $router->render('productos/index', []);
    }

    public static function crear(Router $router)
    {
        $errores = [];

        $router->render('productos/crear', [
            'errores' => $errores,
        ]);
    }
}
