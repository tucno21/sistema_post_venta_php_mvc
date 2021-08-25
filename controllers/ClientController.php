<?php

namespace Controllers;

use MVC\Router;
use Model\Clients;

class ClientController
{
    public static function index(Router $router)
    {
        $clients = Clients::All();
        $router->render('clientes/index', [
            'clients' => $clients,
        ]);
    }

    public static function crear(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['client']['name']) {
                array_push($errores, "El nobre es obligatorio");
            }
            if (!$_POST['client']['dni']) {
                array_push($errores, "El Dni es obligatorio");
            }
            if (!$_POST['client']['email']) {
                array_push($errores, "El email es obligatorio");
            }
            if (!$_POST['client']['telephone']) {
                array_push($errores, "El telefono es obligatorio");
            }
            if (!$_POST['client']['direction']) {
                array_push($errores, "La dirección es obligatorio");
            }
            if (!$_POST['client']['date_birth']) {
                array_push($errores, "La fehca de cumpleaños es obligatorio");
            }
            // if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['client']['email'])) {
            //     array_push($errores, "No es un email");
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
                    if (empty($errores)) {
                        $client = $_POST['client'];
                        $respuesta = Clients::Save($client);

                        if ($respuesta == "ok") {
                            header('Location: /clientes');
                        }
                    }
                } else {
                    array_push($errores, "El email ya existe!");
                }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

        $router->render('clientes/crear', [
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $errores = [];
        $id = validarORedireccionar('/clientes');
        $valorColum = $id;
        //busscar usuario y traer como objeto
        $client = Clients::find($valorColum);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!$_POST['client']['name']) {
                array_push($errores, "El nobre es obligatorio");
            }
            if (!$_POST['client']['dni']) {
                array_push($errores, "El Dni es obligatorio");
            }
            if (!$_POST['client']['email']) {
                array_push($errores, "El email es obligatorio");
            }
            if (!$_POST['client']['telephone']) {
                array_push($errores, "El telefono es obligatorio");
            }
            if (!$_POST['client']['direction']) {
                array_push($errores, "La dirección es obligatorio");
            }
            if (!$_POST['client']['date_birth']) {
                array_push($errores, "La fehca de cumpleaños es obligatorio");
            }
            // if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['client']['email'])) {
            //     array_push($errores, "No es un email");
            // }
            if (
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['client']['name']) &&
                preg_match('/^[0-9]+$/', $_POST['client']['dni']) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST['client']['telephone']) &&
                preg_match('/^[#\.\-a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['client']['direction'])
            ) {
                //Buscar email y traer
                // $colum =  "email";
                // $valorColum = $_POST['client']["email"];
                // $respuesta = Clients::FindColumn($colum, $valorColum);
                // $email = isset($respuesta->email);
                // if (!$email) {
                if (empty($errores)) {
                    $args = $_POST['client'];
                    $respuesta = Clients::update($args, $id);

                    if ($respuesta == "ok") {
                        header('Location: /clientes');
                    }
                }
                // } else {
                //     array_push($errores, "El email ya existe!");
                // }
            } else {
                array_push($errores, "Caracteres no admitidos, ingrese caracteres A-Z y/o 0-9");
            }
        }

        $router->render('clientes/actualizar', [
            'client' => $client,
            'errores' => $errores,
        ]);
    }
}
