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

    public static function buscar(Router $router)
    {
        $obj = array();
        $categorias = Categories::All();
        foreach ($categorias as $category) {
            $colum = 'categoryId';
            $valorColum = $category->id;
            $obj1 = Products::FindColumnArr($colum, $valorColum);
            array_push($obj, $obj1);
        }
        // debuguear($obj);
        // $datosJSON = '{
        //     "data": [';

        // for ($i = 0; $i < count($obj); $i++) {

        //     $category = $obj[$i]->categoryId ?? "0";
        //     $code = $obj[$i]->code ?? "0";
        //     //variable imagen
        //     $datosJSON .= '[
        //                 "' . $category . '",
        //                 "' . $code . '"
        //             ],';
        // }
        // $datosJSON = substr($datosJSON, 0, -1);
        // $datosJSON .= '
        //             ]
        //         }';

        // echo $datosJSON;
        echo json_encode($obj);
        // debuguear($obj);
    }

    public static function crear(Router $router)
    {
        $errores = [];
        $categorias = Categories::All();

        // $obj = array();

        // foreach ($categorias as $category) {
        //     $colum = 'categoryId';
        //     $valorColum = $category->id;
        //     $obj1 = Products::FindColumnArr($colum, $valorColum);
        //     array_push($obj, $obj1);
        // }
        // $array = json_decode(json_encode($obj), true);

        // $found_key = $array[array_search('2', array_column($array, 'categoryId'))];
        // // $found_key = $people[1];

        // debuguear($found_key['code']);

        $router->render('productos/crear', [
            'errores' => $errores,
            'categorias' => $categorias,
        ]);
    }

    public static function lista()
    {

        $products = Products::AllProdCategory();
        // debuguear($products);
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
