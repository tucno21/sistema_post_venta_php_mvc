<?php

namespace Controllers;

use MVC\Router;
use Model\Login;

class DashboardController
{
    public static function index(Router $router)
    {
        $router->render('dashboard/index');
    }
}
