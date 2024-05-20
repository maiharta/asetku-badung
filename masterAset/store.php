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

// $qrquery = "Nama Aset         : '$namaAset'
// Total Barang      : '$totalBarang'
// Lokasi Aset       : '$jenisAset'
// Jenis Aset        : '$tipeAset'
// Tipe Aset         : '$lokasiAset'
// Supplier          : '$supplier'
// Harga             : '$harga'
// Tanggal Pembelian : '$tanggalPembelian'
// Garansi           : '$garansi'
// Deskripsi         : '$deskripsi'";
$query = mysqli_query($connection, "insert into dataaset(namaAset, totalBarang, lokasiAset, jenisAset, tipeAset, supplier, harga, tanggalPembelian, garansi, deskripsi) value('$namaAset', '$totalBarang', '$lokasiAset', '$jenisAset', '$tipeAset', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi')");

// $renderer = new ImageRenderer(
//   new RendererStyle(150),
//   new ImagickImageBackEnd()
// );
// $writer = new Writer($renderer);
// $writer->writeFile($qrquery, 'qrcode.png');

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
