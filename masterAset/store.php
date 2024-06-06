<?php
session_start();
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;


$namaAset = $_POST['namaAset'];
$totalBarang = $_POST['totalBarang'];
$lokasiAset = $_POST['lokasiAset'];
$jenisAset = $_POST['jenisAset'];
$tipeAset = $_POST['tipeAset'];
$samsat = $_POST['samsat'];
$supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$tanggalPembelian = $_POST['tanggalPembelian'];
$garansi = $_POST['garansi'];
$deskripsi = $_POST['deskripsi'];

$qrquery = "Nama Aset : $namaAset
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
$file_direction = 'QrCode.png';
$writer->writeFile($qrquery, $file_direction);

$qrCode = $writer->writeString($qrquery);

// Read the image file
$gambar = file_get_contents($file_direction);

// Prepare the image data for insertion into the database
$gambar = mysqli_real_escape_string($connection, $gambar);


try {
    $query = mysqli_query($connection, "insert into dataaset(namaAset, totalBarang, lokasiAset, jenisAset, tipeAset, samsat, supplier, harga, tanggalPembelian, garansi, deskripsi, gambar) value('$namaAset', '$totalBarang', '$lokasiAset', '$jenisAset', '$tipeAset', '$samsat', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi', '$gambar')");
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
