<?php

namespace Controllers;

use MVC\Router;
use Model\Sales;
use Model\Clients;
use Model\Products;

class SaleController
{
    public static function index(Router $router)
    {

        $router->render('ventas/index', []);
    }

    public static function buscar(Router $router)
    {
        $categorias = Products::All();
        echo json_encode($categorias);
    }

    public static function crear(Router $router)
    {
        $errorCliente = [];
        $Ultima_venta = Sales::LastRecord();
        $clientes = Clients::All();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['client'])) {
                if (!$_POST['client']['name']) {
                    array_push($errorCliente, "El nobre es obligatorio");
                }
                if (!$_POST['client']['dni']) {
                    array_push($errorCliente, "El Dni es obligatorio");
                }
                if (!$_POST['client']['email']) {
                    array_push($errorCliente, "El email es obligatorio");
                }
                if (!$_POST['client']['telephone']) {
                    array_push($errorCliente, "El telefono es obligatorio");
                }
                if (!$_POST['client']['direction']) {
                    array_push($errorCliente, "La dirección es obligatorio");
                }
                if (!$_POST['client']['date_birth']) {
                    array_push($errorCliente, "La fehca de cumpleaños es obligatorio");
                }
                // if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['client']['email'])) {
                //     array_push($errorCliente, "No es un email");
                // }
                if (
                    preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['client']['name']) &&
                    preg_match('/^[0-9]+$/', $_POST['client']['dni']) &&
                    preg_match('/^[()\-0-9 ]+$/', $_POST['client']['telephone']) &&
                    preg_match('/^[#\.\-a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['client']['direction'])
                ) {
                    //Buscar email y traer
                    $colum =  "email";
                    $valorColum = $_POST['client']["email"];
                    $respuesta = Clients::FindColumn($colum, $valorColum);
                    $email = isset($respuesta->email);
                    if (!$email) {
                        if (empty($errorCliente)) {
                            $client = $_POST['client'];
                            $respuesta = Clients::Save($client);

                            if ($respuesta == "ok") {
                                header('Location: /ventas/crear');
                            }
                        }
                    } else {
                        array_push($errorCliente, "El email ya existe!");
                    }
                } else {
                    array_push($errorCliente, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
                }
            }

            if (isset($_POST['ventas'])) {

                //ACTUALIZAR PRODUCTOS
                $productosComprados = json_decode($_POST['ventas']['products']);
                foreach ($productosComprados as $product) {
                    $id = $product->id;
                    $compareproducto = Products::find($id);
                    $ventaMas = $compareproducto->sales + 1;
                    $array = ["stock" => $product->stock, "sales" => $ventaMas];
                    $respuesta = Products::update($array, $id);
                }


                debuguear($respuesta);
            }
        }
        // debuguear($clientes);

        $router->render('ventas/crear-ventas', [
            'Ultima_venta' => $Ultima_venta,
            'clientes' => $clientes,
            'errorCliente' => $errorCliente,
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
            $botones = "<div class='btn-group'><button class='btn btn-primary agreagarProducto recuperarBoton' productoId='" . $products[$i]->id . "'>Agregar</button></div>";
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
                    "' . $stock . '",
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
