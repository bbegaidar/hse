<?php

namespace app\services;
// Include the main TCPDF library (search for installation path).
// use app\TCPDF\examples\tcpdf_include;
require_once '../TCPDF/examples/tcpdf_include.php';

class GenerateCertificate {
  
  public static function generate($fio, $title, $ball, $date, $fio_lenth, $title_lenth, $pdf_name)
  {    
    $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $img_file = '../web/certificate/certificate.jpg';
    $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
    // restore auto-page-break status
    $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
    // set the starting point for the page content
    $pdf->setPageMark();
    // Print a text    
    //  if ($fio_lenth <= 25) {
    //   $pdf->writeHTMLCell(90, 0, 60, 115, $fio);
    // }    
    // else if ($fio_lenth <= 35) {
    //   $pdf->writeHTMLCell(130, 0, 40, 115, $fio);
    // }    
    // else {
      
    // }
    $pdf->writeHTMLCell(180, 0, 20, 115, $fio);
    $pdf->writeHTMLCell(120, 0, 50, 147, $title);
    $pdf->writeHTMLCell(0, 0, 65, 170, $ball);
    $pdf->writeHTMLCell(0, 0, 70, 206, $date);
    $pdf->Output('certificate.pdf', 'I');
  }
}
?>