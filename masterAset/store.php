<?php
session_start();
require_once '../helper/connection.php';
// require_once '../vendor/autoload.php';

// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
// use BaconQrCode\Renderer\RendererStyle\RendererStyle;
// use BaconQrCode\Writer;

$namaAset = $_POST['namaAset'];
$totalBarang = $_POST['totalBarang'];
$lokasiAset = $_POST['lokasiAset'];
$jenisAset = $_POST['jenisAset'];
$tipeAset = $_POST['tipeAset'];
$supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$tanggalPembelian = $_POST['tanggalPembelian'];
$garansi = $_POST['garansi'];
$deskripsi = $_POST['deskripsi'];

// $qrquery = "Nama Aset         : {$row['namaAset']}
// Total Barang      : {$row['totalBarang']}
// Lokasi Aset       : {$row['lokasiAset']}
// Jenis Aset        : {$row['jenisAset']}
// Tipe Aset         : {$row['tipeAset']}
// Supplier          : {$row['supplier']}
// Harga             : {$row['harga']}
// Tanggal Pembelian : {$row['tanggalPembelian']}
// Garansi           : {$row['garansi']}
// Deskripsi         : {$row['deskripsi']}";
$query = mysqli_query($connection, "insert into dataaset(namaAset, totalBarang, lokasiAset, jenisAset, tipeAset, supplier, harga, tanggalPembelian, garansi, deskripsi) value('$namaAset', '$totalBarang', '$lokasiAset', '$jenisAset', '$tipeAset', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi')");

// $renderer = new ImageRenderer(
//   new RendererStyle(150),
//   new ImagickImageBackEnd()
// );
// $writer = new Writer($renderer);
// $writer->writeFile($qrquery, 'storage/qrcode.png');

// $qrCodeImage = 'storage/qrcode.png';
// $qrCodeBase64 = base64_encode(file_get_contents($qrCodeImage));


if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
