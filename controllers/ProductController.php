<?php

namespace Controllers;

use MVC\Router;
use Model\Products;
use Model\Categories;

class ProductController
{
    public static function index(Router $router)
    {
        // $products = Products::AllProdCategory();
        // debuguear($products);
        $router->render('productos/index', [
            // 'products' => $products,

        ]);
    }

    public static function crear(Router $router)
    {
        $errores = [];
        $categorias = Categories::All();

        $router->render('productos/crear', [
            'errores' => $errores,
            'categorias' => $categorias,
        ]);
    }

    public static function lista()
    {

        $products = Products::AllProdCategory();

        $datosJSON = '{
            "data": [';

        for ($i = 0; $i < count($products); $i++) {
            //variable imagen
            $imagen = "<img src='" . $products[$i]->image . "' alt='avatar' class='img-thumbnail' width='40px'>";
            //variable botones
            $botones = "<div class='btn-group'><a class='btn btn-warning' href='/productos/actualizar?id=" . $products[$i]->id . "'><i class='fa fa-edit'></i></a><a class='btn btn-danger avisoAlertaxx' href='/productos/eliminar?id=" . $products[$i]->id . "&tipo=product'><i class='fa fa-times'></i></a></div>";
            //variable color para la stock de product
            if ($products[$i]->stock <= 10) {
                $stock = "<button class='btn btn-danger'>" . $products[$i]->stock . "</button>";
            } else {
                $stock = "<button class='btn btn-success'>" . $products[$i]->stock . "</button>";
            }

            $datosJSON .= '[
                    "' . ($i + 1) . '",
                    "' . $imagen . '",
                    "' . $products[$i]->code . '",
                    "' . $products[$i]->description . '",
                    "' . $products[$i]->category . '",
                    "' . $stock . '",
                    "' . $products[$i]->price_buy . '",
                    "' . $products[$i]->price_sale . '",
                    "' . $products[$i]->date . '",
                    "' . $botones . '"
                ],';
        }
        $datosJSON = substr($datosJSON, 0, -1);
        $datosJSON .= '
                ]
            }';

        echo $datosJSON;
    }
}
