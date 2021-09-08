<?php
// include '../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php';
require_once('../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
// require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('Nicola Asuni');

$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


$html = <<<EOD
<h1>Hola mundo</h1>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->Output('factura.pdf');
debuguear($pdf);
