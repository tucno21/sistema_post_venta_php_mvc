<?php

namespace Controllers;

use MVC\Router;


class ReportController
{
    public static function index(Router $router)
    {
        $router->render('reportes/index', []);
    }
}
