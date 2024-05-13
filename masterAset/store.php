<?php
session_start();
require_once '../helper/connection.php';

// require '../vendor/autoload.php';


// use SimpleSoftwareIO\QrCode\Facades\QrCode;



// $qr = QrCode::format('png')->size(200)->generate($data['kode_booking']);
// Storage::disk('public')->put('/img/qrcodes/'.$data['kode_booking'].'.png', $qr);

// $qrCodeImage = QrCode::format('png')->size(200)->generate($data['dataaset']);

// // Convert the QR code image to a base64 string
// $base64Image = base64_encode($qrCodeImage);

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

$query = mysqli_query($connection, "insert into dataaset(namaAset, totalBarang, lokasiAset, jenisAset, tipeAset, supplier, harga, tanggalPembelian, garansi, deskripsi) value('$namaAset', '$totalBarang', '$lokasiAset', '$jenisAset', '$tipeAset', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi')");
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
