<?php

namespace Controllers;

use Model\Products;
use MVC\Router;
use Model\Sales;


class ReportController
{
    public static function index(Router $router)
    {
        if (isset($_GET['fechaInicial'])) {
            $fechaInicial = $_GET['fechaInicial'];
            $fechaFinal = $_GET['fechaFinal'];

            $ventas = Sales::BuscarRango($fechaInicial, $fechaFinal);
            // debuguear($ventas);
        } else {
            $ventas = Sales::All();
            // debuguear($ventas);
        }
        // debuguear($ventas);

        error_reporting(0);
        $fechaVentaMes = [];
        foreach ($ventas as $ve) {
            $fecha = substr($ve->registration_date, 0, 7);
            $fechaVenta = [$fecha => $ve->total];
            // array_push($fechasVentas, $fechaVentaMes);

            //sumar las ventas del mismo mes
            foreach ($fechaVenta as $key => $value) {
                $fechaVentaMes[$key] += $value;
            }
        }

        //buscar el valor maximo de array
        $valorMax = max($fechaVentaMes);
        $separacionY = round($valorMax / 8);

        // debuguear($separacionY);


        //LOS PRODUCTOS MAS VENDIDOS
        $colum = 'sales';
        $cantidad = '6';

        $productos = Products::findCant($colum, $cantidad);

        $total = 0;
        foreach ($productos as $p) {
            $total += $p->sales;
        }
        // debuguear($total);
        $colores = ['primary', 'secondary', 'success', 'danger', 'warning', 'dark'];
        $colores2 = ['#007BFF', '#7A8489', '#28A74B', '#DD5E5D', '#FFC127', '#5B6259'];

        $router->render('reportes/index', [
            'fechaVentaMes' => $fechaVentaMes,
            'separacionY' => $separacionY,
            'productos' => $productos,
            'colores' => $colores,
            'colores2' => $colores2,
            'total' => $total,

        ]);
    }
}
