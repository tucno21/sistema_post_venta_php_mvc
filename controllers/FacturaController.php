<?php

namespace Controllers;

use MVC\Router;
use Model\Clients;

class FacturaController
{
    public static function index(Router $router)
    {
        $router->render('TCPDF/factura', []);
    }
}
