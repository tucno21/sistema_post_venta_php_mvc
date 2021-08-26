<?php

namespace Controllers;

use MVC\Router;

class SaleController
{
    public static function index(Router $router)
    {

        $router->render('ventas/index', []);
    }

    public static function crear(Router $router)
    {

        $router->render('ventas/crear-ventas', []);
    }
}
