<?php
//autoload
require_once __DIR__ . '/../include/app.php';

use MVC\Router;
use Controllers\UserController;
use Controllers\LoginController;
use Controllers\ClientController;
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
//creacion de JSON PARA productos index y acelerar la carga de HTML
$router->get('/productos/lista', [ProductController::class, "lista"]);
$router->get('/productos/buscar', [ProductController::class, "buscar"]);

// //CRUD CLIENTES
$router->get('/clientes', [ClientController::class, "index"]);
$router->get('/clientes/crear', [ClientController::class, "crear"]);
$router->post('/clientes/crear', [ClientController::class, "crear"]);
$router->get('/clientes/actualizar', [ClientController::class, "actualizar"]);
$router->post('/clientes/actualizar', [ClientController::class, "actualizar"]);
$router->get('/clientes/eliminar', [ClientController::class, "eliminar"]);

//lamando el metodo de ruter
$router->comprobarRutas();
