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

    // Add the logo image
    $logoImagePath = '../assets/img/PemKab_Badung.png';
    $pdf->Image($logoImagePath, 75, 20, 50, 0, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
    // Add the QR code image
    $pdf->Image($qrCodeImage, 75, 60, 50, 50, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

    // Display the asset name
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetXY(0, 110); // Adjust the position as needed
    $pdf->Cell(0, 10, $row['namaAset'], 0, 1, 'C');

    // Set the line width to 2px
    $pdf->SetLineWidth(2);

    // Draw a 5px border around the entire content
    $pdf->Rect(70, 15, 60, 120, 'D'); // Adjust the coordinates and dimensions as needed

    ob_end_clean();
    $namaAset = $row['namaAset'];
    $pdf->Output("QrCode_{$namaAset}.pdf", 'D');
} else {
    echo "Asset not found or database query error.";
}
