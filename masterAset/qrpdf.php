<?php
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');
require_once '../helper/connection.php';

$id_aset = $_GET['id_aset'];
$query = mysqli_query($connection, "SELECT * FROM dataaset WHERE id_aset='$id_aset'");

if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $qrCodeImage = $row['gambar']; 

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Aset Badung');
    $pdf->SetTitle('Aset Badung');
    $pdf->SetSubject('Aset Badung');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    $pdf->AddPage();
    $pdf->Image($qrCodeImage, 15, 40, 50, 50, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
    ob_end_clean();
    $namaAset = $row['namaAset'];
    $pdf->Output("QrCode_{$namaAset}.pdf", 'D');
} else {
    echo "Asset not found or database query error.";
}
