<?php
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM datamt");

// Create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Asetku Badung');
$pdf->SetTitle('Data Maintenance Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara');
$pdf->SetSubject('Asetku Badung');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a title
$html = '<h3 style="text-align: center;">Daftar Pemeliharaan Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara</h3>
<img src="../assets/img/PemKab_Badung.png" alt="logo" width="100" />
<p style="line-height: 8px;"><strong>Provinsi :</strong> Bali</p>
<p style="line-height: 2px;"><strong>Kab./Kota :</strong> PEMERINTAHAN KABUPATEN BADUNG</p>
<p style="line-height: 2px;"><strong>Bidang :</strong> Gubernut/Bupati/Walikota</p>
<p style="line-height: 2px;"><strong>Unit Organisasi :</strong> Kecamatan Kuta Utara</p>
<p style="line-height: 2px;"><strong>Sub Unit Organisasi :</strong> Kecamatan Kuta Utara</p>
<p style="line-height: 2px;"><strong>U P B :</strong> Kecamatan Kuta Utara</p>
<p><strong>No. Kode Lokasi :</strong> 12.14.01.02.05.01.01</p>';

// Add table
$html .= '<table border="1" cellpadding="4">
<thead>
<tr>
    <th>Nama Aset</th>
    <th>Biaya Maintenance</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal selesai</th>
    <th>Keterangan</th>
    <th>Status</th>
</tr>
</thead>
<tbody>';

// Assuming $result contains the data from the database query
while ($data = mysqli_fetch_array($result)) {
    $originalDate = $data['tanggalMulai'];
    $mulai = date("d-m-Y", strtotime($originalDate));
    $originalDate = $data['tanggalSelesai'];
    $selesai = date("d-m-Y", strtotime($originalDate));

    $html .= '<tr>
    <td>' . $data['namaAset'] . '</td>
    <td>' . $data['biayaMt'] . '</td>
    <td>' . $mulai . '</td>
    <td>' . $selesai . '</td>
    <td>' . $data['keterangan'] . '</td>
    <td>' . $data['status'] . '</td>
    </tr>';
}

$html .= '</tbody>
</table>';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('Laporan Maintenance.pdf', 'D');
?>
