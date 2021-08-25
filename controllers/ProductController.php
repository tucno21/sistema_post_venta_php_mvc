<?php

namespace Controllers;

use MVC\Router;
use Model\Products;
use Model\Categories;
use Intervention\Image\ImageManagerStatic as Imagex;

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['product']['categoryId']) {
                array_push($errores, "la categoria es obligatorio");
            }
            if (!$_POST['product']['description']) {
                array_push($errores, "el nombre del producto es obligatorio");
            }
            if (!$_POST['product']['stock']) {
                array_push($errores, "el stock es obligatorio");
            }
            if (!$_POST['product']['price_buy']) {
                array_push($errores, "el precio de compra es obligatorio");
            }
            if (!$_POST['product']['price_sale']) {
                array_push($errores, "el precio de venta es obligatorio");
            }
            if (!$_FILES['product']['tmp_name']['image']) {
                array_push($errores, "La imagen es obligatorio");
            }
            if (
                preg_match('/^[0-9]+$/', $_POST['product']['categoryId']) &&
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['product']['description']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['stock']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['price_buy']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['price_sale'])
            ) {
                if (empty($errores)) {
                    //generar nombre unico para la imagen
                    $nameImage = md5(uniqid(rand(), true)) . '.jpg';

                    if ($_FILES['product']['tmp_name']['image']) {
                        //modificar imagen
                        $image = Imagex::make($_FILES['product']['tmp_name']['image'])->fit(800, 600);
                        //agregar al array
                        $_POST['product']['image'] = $nameImage;
                    }

                    if (!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }
                    $product = $_POST['product'];
                    $respuesta = Products::Save($product);

                    $image->save(CARPETA_IMAGENES . $nameImage);
                    // debuguear($respuesta);

                    if ($respuesta == "ok") {
                        header('Location: /productos');
                    }
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

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

    public static function actualizar(Router $router)
    {
        $errores = [];
        $id = validarORedireccionar('/productos');
        $valorColum = $id;
        //busscar usuario y traer como objeto
        $product = Products::find($valorColum);
        $categorias = Categories::All();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['product']['categoryId']) {
                array_push($errores, "la categoria es obligatorio");
            }
            if (!$_POST['product']['description']) {
                array_push($errores, "el nombre del producto es obligatorio");
            }
            if (!$_POST['product']['stock']) {
                array_push($errores, "el stock es obligatorio");
            }
            if (!$_POST['product']['price_buy']) {
                array_push($errores, "el precio de compra es obligatorio");
            }
            if (!$_POST['product']['price_sale']) {
                array_push($errores, "el precio de venta es obligatorio");
            }
            if (
                preg_match('/^[0-9]+$/', $_POST['product']['categoryId']) &&
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['product']['description']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['stock']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['price_buy']) &&
                preg_match('/^[0-9]+$/', $_POST['product']['price_sale'])
            ) {
                $args = $_POST['product'];
                if ($_FILES['product']['tmp_name']['image']) {
                    //modificar imagen
                    $image = Imagex::make($_FILES['product']['tmp_name']['image'])->fit(800, 600);
                    //crea un nombre aleatorio
                    $nameImage = md5(uniqid(rand(), true)) . '.jpg';

                    $existeAchivo = file_exists(CARPETA_IMAGENES . $product->image);
                    if ($existeAchivo) {
                        unlink(CARPETA_IMAGENES . $product->image);
                    }
                    //enviar nombre foto al array
                    $args['image'] = $nameImage;
                    //guardar server
                    $image->save(CARPETA_IMAGENES . $nameImage);
                }

                // debuguear($args);
                //eenviar el array y actualizar
                $respuesta = Products::update($args, $id);

                if ($respuesta == "ok") {
                    header('Location: /productos');
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }



        $router->render('productos/actualizar', [
            'product' => $product,
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
            $imagen = "<img src='../imagenes/" . $products[$i]->image . "' alt='avatar' class='img-thumbnail' width='40px'>";
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
