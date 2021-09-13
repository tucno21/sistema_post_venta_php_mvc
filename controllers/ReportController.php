<?php

namespace Controllers;

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
            $ventas = Sales::AllSales();
            // debuguear($ventas);
        }
        // debuguear($ventas);

        error_reporting(0);
        $fechaVentaMes = [];
        foreach ($ventas as $ve) {
            $fecha = substr($ve->registration_date, 0, 7);
            $arrayVenta = [$fecha => $ve->total];
            // array_push($fechasVentas, $array);

            //sumar las ventas del mismo mes
            foreach ($arrayVenta as $key => $value) {
                $fechaVentaMes[$key] += $value;
            }
        }

        // debuguear($fechaVentaMes);

        $router->render('reportes/index', [
            'fechaVentaMes' => $fechaVentaMes,
        ]);
    }
}
