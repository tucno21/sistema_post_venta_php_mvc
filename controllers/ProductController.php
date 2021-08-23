<?php

namespace Controllers;

use MVC\Router;
use Model\Products;

class ProductController
{
    public static function index(Router $router)
    {
        $products = Products::AllProdCategory();
        // debuguear($products);
        $router->render('productos/index', [
            'products' => $products,

        ]);
    }

    public static function crear(Router $router)
    {
        $errores = [];

        $router->render('productos/crear', [
            'errores' => $errores,
        ]);
    }
}
