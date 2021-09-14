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


        //LOS PRODUCTOS MAS VENDIDOS/////////////////////////
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

        //LOS VENTA DE VENDEDORES /////////////////////////
        $ventasTotal = Sales::AllSales();
        $vendedorTotal = [];
        foreach ($ventasTotal as $ve) {
            $vt = [$ve->name_u => $ve->total];

            //sumar las ventas del mismo mes
            foreach ($vt as $key => $value) {
                $vendedorTotal[$key] += $value;
            }
        }
        //LOS CLIENTES /////////////////////////
        $clienteTotal = [];
        foreach ($ventasTotal as $ve) {
            $vt = [$ve->name => $ve->total];

            //sumar las ventas del mismo mes
            foreach ($vt as $key => $value) {
                $clienteTotal[$key] += $value;
            }
        }

        // debuguear($vendedorTotal);


        $router->render('reportes/index', [
            'fechaVentaMes' => $fechaVentaMes,
            'separacionY' => $separacionY,
            'productos' => $productos,
            'colores' => $colores,
            'colores2' => $colores2,
            'total' => $total,
            'vendedorTotal' => $vendedorTotal,
            'clienteTotal' => $clienteTotal,
        ]);
    }


    public static function excel(Router $router)
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

        $name = 'reporte' . isset($_GET['fechaInicial']) . '.xls';


        // header('Expires: 0');
        // header('Cache-control: private');
        // header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
        // header("Cache-Control: cache, must-revalidate");
        // header('Content-Description: File Transfer');
        // header('Last-Modified: ' . date('D, d M Y H:i:s'));
        // header("Pragma: public");
        // header('Content-Disposition:; filename="' . $name . '"');
        // header("Content-Transfer-Encoding: binary");

        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment; filename="' . $name . '"');
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        echo utf8_decode(
            "<table border='0'>
                    <tr> 
					<td style='font-weight:bold; border:1px solid #bebebe;'>CÓDIGO</td> 
					<td style='font-weight:bold; border:1px solid #bebebe;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #bebebe;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #bebebe;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #bebebe;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #bebebe;'>IMPUESTO</td>
					<td style='font-weight:bold; border:1px solid #bebebe;'>NETO</td>		
					<td style='font-weight:bold; border:1px solid #bebebe;'>TOTAL</td>		
					<td style='font-weight:bold; border:1px solid #bebebe;'>METODO DE PAGO</td	
					<td style='font-weight:bold; border:1px solid #bebebe;'>FECHA</td>		
					</tr>"
        );

        foreach ($ventas as $venta) {
            echo utf8_decode("
            <tr> 
					<td style='border:1px solid #bebebe;'>" . $venta->sale_code . "</td> 
					<td style='border:1px solid #bebebe;'>" . $venta->name . "</td>
					<td style='border:1px solid #bebebe;'>" . $venta->name_u . "</td>
                    <td style='border:1px solid #bebebe;'>");

            $productos =  json_decode($venta->products, true);

            foreach ($productos as $key => $valueProductos) {
                echo utf8_decode(
                    $valueProductos["cantidad"] . "<br>"
                );
            }

            echo utf8_decode(
                "</td>
					<td style='border:1px solid #bebebe;'>"
            );

            foreach ($productos as $key => $valueProductos) {
                echo utf8_decode(
                    $valueProductos["description"] . "<br>"
                );
            }

            echo utf8_decode(
                "</td>"
            );

            echo utf8_decode(
                "<td style='border:1px solid #bebebe;'>" . number_format($venta->total - $venta->net, 2) . "</td>
					<td style='border:1px solid #bebebe;'>" . number_format($venta->net, 2) . "</td>		
					<td style='border:1px solid #bebebe;'>" . number_format($venta->total, 2) . "</td>		
					<td style='border:1px solid #bebebe;'>" . $venta->payment_method . "</td	
					<td style='border:1px solid #bebebe;'>" . substr($venta->registration_date, 0, 10) . "</td>		
					</tr>"
            );
        }

        echo ("</table>");
    }
}
