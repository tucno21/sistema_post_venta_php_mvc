<?php
//autoload
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
use Controllers\UserController;
use Controllers\LoginController;
use Controllers\DashboardController;
//llamando al controller


$router = new Router();

//le pasamos la url y la funcion al ROUTER
$router->get('/', [DashboardController::class, "index"]);

// $router->get('/login', [LoginController::class, "login"]);
$router->post('/', [LoginController::class, "login"]);
$router->get('/logout', [LoginController::class, "logout"]);

//CRUD USUARIOS
$router->get('/usuarios', [UserController::class, "index"]);

//lamando el metodo de ruter
$router->comprobarRutas();
