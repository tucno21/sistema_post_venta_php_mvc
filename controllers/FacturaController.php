<?php

namespace Controllers;

use Model\Clients;
use MVC\Router;
use Model\Sales;
use Model\Users;

class FacturaController
{
    public static function index(Router $router)
    {
        //TRAER LA VENTA
        $id = validarORedireccionar('/ventas');
        $valorColum = $id;
        $venta = Sales::find($valorColum);

        //productos
        $ventaProductos = json_decode($venta->products);

        //TRAER EL VENDEDOR
        $valorColum = $venta->sellerId;
        $vendedor = Users::find($valorColum);
        $vendedorUser = json_decode(json_encode(["id" => $vendedor->id, "name_u" => $vendedor->name_u]));

        //TRAER EL CLIENTE
        $valorColum = $venta->clientId;
        $cliente = Clients::find($valorColum);
        // debuguear($ventaProductos);

        $router->render('pdf/factura', [
            'venta' => $venta,
            'ventaProductos' => $ventaProductos,
            'vendedorUser' => $vendedorUser,
            'cliente' => $cliente,
        ]);
    }
}
