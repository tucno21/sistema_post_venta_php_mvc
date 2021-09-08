<?php
// include '../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php';
require_once('../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
// require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
<table style="font-size:9px; text-align:center">
	<tr>
		<td style="width:150px;">
            <img src="factura/image/logo.png" alt="logo">
        </td>

        <td style="background-color:white; width:140px;">
            <div style="font-size: 8.5px; text-align: right; ">
                <p>NIT: 71.51.56.8</p>
                <p>direccion: hunata</p>
            </div>
        </td>

        <td style="background-color:white; width:140px;">
            <div style="font-size: 8.5px; text-align: right; ">
                <p>telefono: 910954568</p>
                <p>ayacucho@com.pe</p>
            </div>
        </td>

        <td style="background-color:white; width:110px;">
            <div style="font-size: 8.5px; text-align: center; color:red; ">
                <p>factura N°</p>
                <p>$venta->sale_code</p>
            </div>
        </td>
	</tr>
</table>
EOF;
$pdf->writeHTML($bloque1, false, false, false, false, '');


$bloque2 = <<<EOF
<table style="font-size:10px; padding:5px 10px;">
	<tr>
		<td style="border:1px solid #666; background-color:white; width:390px;">
            Cliente: $cliente->name
        </td>

        <td style="border:1px solid #666; background-color:white; width:150px; text-align: right;">
            Fecha: $venta->registration_date
        </td>

	</tr>

    <tr>
        <td style="border:1px solid #666; background-color:white; width:540px;">
            Vendedor: $vendedorUser->name_u
        </td>
    </tr>

</table>
EOF;
$pdf->writeHTML($bloque2, false, false, false, false, '');

$bloque3 = <<<EOF
<table style="font-size:10px; padding:5px 10px; margin-top:40px;">
	<tr>
		<td style="border:1px solid #666; background-color:white; width:260px; text-align:center;">
            Producto
        </td>
        <td style="border:1px solid #666; background-color:white; width:80px; text-align:center;">
            Cantidad
        </td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">
            Valor Unit.
        </td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">
            Valor Total
        </td>

	</tr>

</table>
EOF;
$pdf->writeHTML($bloque3, false, false, false, false, '');

foreach ($ventaProductos as $vp) {
    $precioU = number_format($vp->precio, 2);
    $total = number_format($vp->total, 2);

    $bloque4 = <<<EOF
<table style="font-size:10px; padding:5px 10px; margin-top:40px;">
	<tr>
		<td style="border:1px solid #666; background-color:white; width:260px; text-align:center;">
            $vp->description
        </td>
        <td style="border:1px solid #666; background-color:white; width:80px; text-align:center;">
            $vp->cantidad
        </td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">
            s/ $precioU
        </td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">
            s/ $total
        </td>

	</tr>

</table>
EOF;
    $pdf->writeHTML($bloque4, false, false, false, false, '');
}

$neto = number_format($venta->net, 2);
$impuesto = number_format($venta->tax_result, 2);
$total = number_format($venta->total, 2);

$bloque5 = <<<EOF
<table style="font-size:10px; padding:5px 10px; margin-top:40px;">
	<tr>
		<td style="color:#333; background-color:white; width:340px; text-align:center;"></td>
        <td style="border-bottom:1px solid #666; background-color:white; width:100px; text-align:center;"></td>
        <td style="border-bottom:1px solid #666; color:#333; background-color:white; width:100px; text-align:center;"></td>
	</tr>

    <tr>
        <td style="border-right:1px solid #666; color:#333; background-color:white; width:340px; text-align:center;"></td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">Neto:</td>
        <td style="border:1px solid #666; color:#333; background-color:white; width:100px; text-align:center;">
        s/ $neto
        </td>
    </tr>

    <tr>
        <td style="border-right:1px solid #666; color:#333; background-color:white; width:340px; text-align:center;"></td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">Impuesto:</td>
        <td style="border:1px solid #666; color:#333; background-color:white; width:100px; text-align:center;">
        s/ $impuesto
        </td>
    </tr>

    <tr>
        <td style="border-right:1px solid #666; color:#333; background-color:white; width:340px; text-align:center;"></td>
        <td style="border:1px solid #666; background-color:white; width:100px; text-align:center;">Total:</td>
        <td style="border:1px solid #666; color:#333; background-color:white; width:100px; text-align:center;">
        s/ $total
        </td>
    </tr>

</table>
EOF;
$pdf->writeHTML($bloque5, false, false, false, false, '');


//SALIDA DEL ARCHIVO 
//$pdf->Output('factura.pdf', 'D');
$pdf->Output('factura.pdf');
debuguear($pdf);
