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

        $router->render('reportes/index', [
            'fechaVentaMes' => $fechaVentaMes,
            'separacionY' => $separacionY,
        ]);
    }
}
