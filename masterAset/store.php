<?php
session_start();
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

$opsiAset = $_POST['opsiAset'];
$noRegister = $_POST['noRegister'];
$kodeBarang = $_POST['kodeBarang'];
$namaAset = $_POST['namaAset'];
$totalBarang = $_POST['totalBarang'];
$lokasiAset = $_POST['lokasiAset'];
$tipeAset = $_POST['tipeAset'];
$samsat = $_POST['samsat'];
$supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$tanggalPembelian = $_POST['tanggalPembelian'];
$garansi = $_POST['garansi'];
$deskripsi = $_POST['deskripsi'];

$qrquery = "Status Usul Aset : $opsiAset
Nomer Register : $noRegister
Kode Barang : $kodeBarang
Nama Aset : $namaAset
Total Aset : $totalBarang
Lokasi Aset : $lokasiAset
Tipe dan Jenis Aset : $tipeAset $samsat
Supplier : $supplier
Harga : $harga
Tanggal Pembelian : $tanggalPembelian
Garansi : $garansi
Deskripsi : $deskripsi";

$renderer = new ImageRenderer(
    new RendererStyle(200),
    new ImagickImageBackEnd()
);
$writer = new Writer($renderer);
$randomNumber = time();
$file_direction = "storage/qrcode_$namaAset-{$randomNumber}.png";
$writer->writeFile($qrquery, $file_direction);
$qrCode = $writer->writeString($qrquery);

$tmpFile = $_FILES['fotoBukti']['tmp_name'];
$originalFilename = $_FILES['fotoBukti']['name'];
$newFile = 'storage/' . $randomNumber . '_' . $originalFilename;

if (move_uploaded_file($tmpFile, $newFile)) {
    echo "File uploaded successfully.";
} else {
    echo "Failed to upload the file.";
}

try {
    $query = mysqli_query($connection, "insert into dataaset(opsiAset, noRegister, kodeBarang, namaAset, totalBarang, lokasiAset, tipeAset, samsat, supplier, harga, tanggalPembelian, garansi, deskripsi, gambar, fotoBukti) value('$opsiAset', '$noRegister', '$kodeBarang', '$namaAset', '$totalBarang', '$lokasiAset', '$tipeAset', '$samsat', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi', '$file_direction', '$newFile')");
    if ($query) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menambah data'
        ];
    } else {
        throw new Exception(mysqli_error($connection));
    }
} catch (Exception $e) {
    error_log($e->getMessage(), 3, 'storage/error.log');

    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Gagal menambah data'
    ];
}
header('Location: ./index.php');
