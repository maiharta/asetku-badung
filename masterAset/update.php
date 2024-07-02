<?php
session_start();
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

$id_aset = $_POST['id_aset'];
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
$file_direction = "storage/qrcode_edit_$namaAset-{$randomNumber}.png";
$writer->writeFile($qrquery, $file_direction);
$qrCode = $writer->writeString($qrquery);

// Fetch existing fotoBukti from the database
$query = mysqli_query($connection, "SELECT fotoBukti FROM dataaset WHERE id_aset = '$id_aset'");
$result = mysqli_fetch_assoc($query);
$existingFile = $result['fotoBukti'];

// Check if a new file is uploaded
if (!empty($_FILES['fotoBukti']['tmp_name'])) {
    $tmpFile = $_FILES['fotoBukti']['tmp_name'];
    $originalFilename = $_FILES['fotoBukti']['name'];
    $newFile = 'storage/' . $randomNumber . '_' . $originalFilename;

    // Move the uploaded file to the desired location
    move_uploaded_file($tmpFile, $newFile);
} else {
    // Use the existing file if no new file is uploaded
    $newFile = $existingFile;
}

// Update the database with the new file path or existing file path
$query = mysqli_query($connection, "UPDATE dataaset SET fotoBukti = '$newFile' WHERE id_aset = '$id_aset'");

// Check if the query was successful
if ($query) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . mysqli_error($connection);
}


try {
  $query = mysqli_query($connection, "UPDATE dataaset SET opsiAset = '$opsiAset', noRegister = '$noRegister', kodeBarang = '$kodeBarang', namaAset = '$namaAset', totalBarang = '$totalBarang', lokasiAset = '$lokasiAset', tipeAset = '$tipeAset', samsat = '$samsat', supplier = '$supplier', harga = '$harga', tanggalPembelian = '$tanggalPembelian', garansi = '$garansi', deskripsi = '$deskripsi', gambar = '$file_direction', fotoBukti = '$newFile'  WHERE id_aset = '$id_aset'");
  if ($query) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil mengubah data'
    ];
  } else {
    throw new Exception(mysqli_error($connection));
  }
} catch (Exception $e) {
  error_log($e->getMessage(), 3, 'storage/error.log');

  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Gagal mengubah data'
  ];
}
header('Location: ./index.php');
