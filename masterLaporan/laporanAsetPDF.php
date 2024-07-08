<?php
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');
require_once '../helper/connection.php';

$tipeAset = isset($_POST['tipeAset']) ? $_POST['tipeAset'] : null;

// Create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Asetku Badung');
$pdf->SetTitle('Data Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara');
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

// Capture the filter criteria
$tipeAset = isset($_POST['tipeAset']) ? $_POST['tipeAset'] : 'noFilter';

// Generate the title based on the filter
$title = 'Daftar Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara';
if ($tipeAset == 'Komputer') {
    $title = 'Daftar Peralatan Komputer Kantor Camat Kuta Utara';
} elseif ($tipeAset == 'Kendaraan') {
    $title = 'Daftar Kendaraan Kantor Camat Kuta Utara';
}

// Add a title
$html = '<h3 style="text-align: center;">' . $title . '</h3>
<img src="../assets/img/PemKab_Badung.png" alt="logo" width="100" />
<p style="line-height: 8px;"><strong>Provinsi :</strong> Bali</p>
<p style="line-height: 2px;"><strong>Kab./Kota :</strong> PEMERINTAHAN KABUPATEN BADUNG</p>
<p style="line-height: 2px;"><strong>Bidang :</strong> Gubernur/Bupati/Walikota</p>
<p style="line-height: 2px;"><strong>Unit Organisasi :</strong> Kecamatan Kuta Utara</p>
<p style="line-height: 2px;"><strong>Sub Unit Organisasi :</strong> Kecamatan Kuta Utara</p>
<p style="line-height: 2px;"><strong>U P B :</strong> Kecamatan Kuta Utara</p>
<p><strong>No. Kode Lokasi :</strong> 12.14.01.02.05.01.01</p>';

// Add table
$html .= '<table border="1" cellpadding="4">
<thead>
<tr>
    <th>Status Usul Aset</th>
    <th>Nomer Registrasi</th>
    <th>Kode Barang</th>
    <th>Nama Aset</th>
    <th>Total Barang</th>
    <th>Lokasi Aset</th>
    <th>Tipe dan Jenis Aset</th>
    <th>Supplier</th>
    <th>Harga</th>
    <th>Tanggal Pembelian</th>
    <th>Garansi</th>
    <th>Deskripsi</th>
</tr>
</thead>
<tbody>';

$query = "SELECT * FROM `dataaset`";
if ($tipeAset) {
    if ($tipeAset == 'Komputer') {
        $query .= " WHERE `tipeAset` LIKE 'komputer (elektronik)'";
    } else if ($tipeAset == 'Kendaraan') {
        $query .= " WHERE `tipeAset` LIKE '%(kendaraan)'";
    }
}

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

while ($data = mysqli_fetch_array($result)) {
    $originalDate = $data['tanggalPembelian'];
    $Pembelian = date("d-m-Y", strtotime($originalDate));

    $html .= '<tr>
    <td>' . $data['opsiAset'] . '</td>
    <td>' . $data['noRegister'] . '</td>
    <td>' . $data['kodeBarang'] . '</td>
    <td>' . $data['namaAset'] . '</td>
    <td>' . $data['totalBarang'] . '</td>
    <td>' . $data['lokasiAset'] . '</td>
    <td>' . $data['tipeAset'] . '</td>
    <td>' . $data['supplier'] . '</td>
    <td>' . $data['harga'] . '</td>
    <td>' . $Pembelian . '</td>
    <td>' . $data['garansi'] . '</td>
    <td>' . $data['deskripsi'] . '</td>
    </tr>';
}

$html .= '</tbody>
</table>';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// Generate the titlePDF based on the filter
$titlePDF = 'Laporan Semua Aset.pdf';
if ($tipeAset == 'Komputer') {
    $titlePDF = 'Laporan Aset Komputer.pdf';
} elseif ($tipeAset == 'Kendaraan') {
    $titlePDF = 'Laporan Aset Kendaraan.pdf';
}

// Close and output PDF document
$pdf->Output($titlePDF, 'D');
?>
