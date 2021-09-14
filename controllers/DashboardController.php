<?php

namespace Controllers;

use MVC\Router;
use Model\Login;
use Model\Sales;
use Model\Clients;
use Model\Categories;
use Model\Products;

class DashboardController
{
    public static function index(Router $router)
    {
        $colum = "net";
        $totalVenta = Sales::sumaColum($colum);

        $categorias = Categories::All();
        $clientes = Clients::All();
        $productos = Products::All();


        // debuguear($totalVenta[0]->total);
        // debuguear($totalVenta["SUM(net)"]);

        $router->render('dashboard/index', [
            'totalVenta' => $totalVenta,
            'categorias' => $categorias,
            'clientes' => $clientes,
            'productos' => $productos,
        ]);
    }
}
