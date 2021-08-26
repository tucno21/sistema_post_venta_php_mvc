<?php

namespace Controllers;

use MVC\Router;
use Model\Sales;
use Model\Clients;

class SaleController
{
    public static function index(Router $router)
    {

        $router->render('ventas/index', []);
    }

    public static function crear(Router $router)
    {
        $errorCliente = [];
        $Ultima_venta = Sales::LastRecord();
        $clientes = Clients::All();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['client']) {
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
        }
        // debuguear($clientes);

        $router->render('ventas/crear-ventas', [
            'Ultima_venta' => $Ultima_venta,
            'clientes' => $clientes,
            'errorCliente' => $errorCliente,
        ]);
    }
}
