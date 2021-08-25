<?php

namespace Controllers;

use MVC\Router;

class ClientController
{
    public static function index(Router $router)
    {
        $router->render('clientes/index', []);
    }

    public static function crear(Router $router)
    {
        $router->render('clientes/crear', []);
    }
}
