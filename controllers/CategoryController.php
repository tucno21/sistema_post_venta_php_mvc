<?php

namespace Controllers;

use MVC\Router;

class CategoryController
{
    public static function index(Router $router)
    {
        $router->render('categorias/index', []);
    }
}
