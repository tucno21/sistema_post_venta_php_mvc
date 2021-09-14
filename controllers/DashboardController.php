<?php

namespace Controllers;

use MVC\Router;
use Model\Login;
use Model\Sales;

class DashboardController
{
    public static function index(Router $router)
    {
        $colum = "net";
        $totalVenta = Sales::sumaColum($colum);


        // debuguear($totalVenta[0]->total);
        // debuguear($totalVenta["SUM(net)"]);

        $router->render('dashboard/index', [
            'totalVenta' => $totalVenta,
        ]);
    }
}
