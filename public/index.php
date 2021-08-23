<?php
//autoload
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
use Controllers\UserController;
use Controllers\LoginController;
use Controllers\ProductController;
use Controllers\CategoryController;
use Controllers\DashboardController;
//llamando al controller


$router = new Router();

//le pasamos la url y la funcion al ROUTER
$router->get('/', [DashboardController::class, "index"]);

// $router->get('/login', [LoginController::class, "login"]);
$router->post('/', [LoginController::class, "login"]);
$router->get('/logout', [LoginController::class, "logout"]);

// //CRUD USUARIOS
$router->get('/usuarios', [UserController::class, "index"]);
$router->get('/usuarios/crear', [UserController::class, "crear"]);
$router->post('/usuarios/crear', [UserController::class, "crear"]);
$router->get('/usuarios/actualizar', [UserController::class, "actualizar"]);
$router->post('/usuarios/actualizar', [UserController::class, "actualizar"]);
$router->get('/usuarios/eliminar', [UserController::class, "eliminar"]);

// //CRUD CATEGORIAS
$router->get('/categorias', [CategoryController::class, "index"]);
$router->get('/categorias/crear', [CategoryController::class, "crear"]);
$router->post('/categorias/crear', [CategoryController::class, "crear"]);
$router->get('/categorias/actualizar', [CategoryController::class, "actualizar"]);
$router->post('/categorias/actualizar', [CategoryController::class, "actualizar"]);
$router->get('/categorias/eliminar', [CategoryController::class, "eliminar"]);

// //CRUD PRODUCTOS
$router->get('/productos', [ProductController::class, "index"]);
$router->get('/productos/crear', [ProductController::class, "crear"]);
$router->post('/productos/crear', [ProductController::class, "crear"]);
$router->get('/productos/actualizar', [ProductController::class, "actualizar"]);
$router->post('/productos/actualizar', [ProductController::class, "actualizar"]);
$router->get('/productos/eliminar', [ProductController::class, "eliminar"]);

//lamando el metodo de ruter
$router->comprobarRutas();
