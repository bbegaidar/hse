<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('freeserif', '', 48);

// add a page
$pdf->AddPage();

$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'certificate.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// Print a text
$fio = '<p style="font-size: 26px; text-align: center;">Садыков Рахат</p>';
$html = '<p style="width: 200px; margin: 200px auto; font-size: 26px; text-align: center;">Правила эвакуации при пожаре на предприятии</p>';
$ball = '<p style="font-size: 26px; text-align: center;">100 баллов.</p>';
$date = '<p style="font-size: 12px; text-align: center;">03.03.2020 г</p>';
$pdf->writeHTMLCell(120, 0, 50, 115, $fio);
$pdf->writeHTMLCell(120, 0, 50, 147, $html);
$pdf->writeHTMLCell(0, 0, 65, 170, $ball);
$pdf->writeHTMLCell(0, 0, 70, 206, $date);
$pdf->Output('example_051.pdf', 'I');
?>