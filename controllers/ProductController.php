<?php

namespace Controllers;

use MVC\Router;

class ProductController
{
    public static function index(Router $router)
    {

        $router->render('productos/index', []);
    }
}
