<?php
//autoload
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
use Controllers\UserController;
//llamando al controller


$router = new Router();

//le pasamos la url y la funcion al ROUTER
$router->get('/prueba', [UserController::class, "index"]);


//lamando el metodo de ruter
$router->comprobarRutas();
