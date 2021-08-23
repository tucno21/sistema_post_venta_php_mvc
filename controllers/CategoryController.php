<?php

namespace Controllers;

use MVC\Router;
use Model\Categories;

class CategoryController
{
    public static function index(Router $router)
    {
        $categories = Categories::All();
        $router->render('categorias/index', [
            'categories' => $categories,
        ]);
    }

    public static function crear(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['categoria']['category']) {
                array_push($errores, "La categoria es obligatorio");
            }
            if (
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['categoria']['category'])
            ) {
                //Buscar ususario y traer
                $colum =  "category";
                $valorColum = $_POST['categoria']["category"];
                $respuesta = Categories::FindColumn($colum, $valorColum);
                $nombre = isset($respuesta->category);
                if (!$nombre) {
                    if (empty($errores)) {
                        $category = $_POST['categoria'];
                        $respuesta = Categories::Save($category);

                        if ($respuesta == "ok") {
                            header('Location: /categorias');
                        }
                    }
                } else {
                    array_push($errores, "La categoria ya existe!");
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

        $router->render('categorias/crear', [
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $errores = [];
        $id = validarORedireccionar('/categorias');
        $valorColum = $id;
        //busscar usuario y traer como objeto
        $categoria = Categories::find($valorColum);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['categoria']['category']) {
                array_push($errores, "La categoria es obligatorio");
            }
            if (
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['categoria']['category'])
            ) {
                //Buscar ususario y traer
                $colum =  "category";
                $valorColum = $_POST['categoria']["category"];
                $respuesta = Categories::FindColumn($colum, $valorColum);
                $nombre = isset($respuesta->category);
                if (!$nombre) {
                    if (empty($errores)) {
                        $args = $_POST['categoria'];
                        $respuesta = Categories::update($args, $id);

                        if ($respuesta == "ok") {
                            header('Location: /categorias');
                        }
                    }
                } else {
                    array_push($errores, "La categoria ya existe!");
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

        $router->render('categorias/actualizar', [
            'errores' => $errores,
            'categoria' => $categoria,
        ]);
    }
}
