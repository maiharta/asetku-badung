<?php
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aset Badung');
$pdf->SetTitle('Aset Badung');
$pdf->SetSubject('Aset Badung');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->AddPage();

$qrCodeImage = 'storage/qrcode.png';
$pdf->Image($qrCodeImage, 15, 40, 50, 50, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

ob_end_clean();
$pdf->Output('QrCode.pdf', 'D');
