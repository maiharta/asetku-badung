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

$randomNumber = time();
$tmpFile = $_FILES['fotoBukti']['tmp_name'];
$originalFilename = $_FILES['fotoBukti']['name'];
$newFile = 'storage/' . $randomNumber . '_' . $originalFilename;

if (move_uploaded_file($tmpFile, $newFile)) {
    echo "File uploaded successfully.";
} else {
    echo "Failed to upload the file.";
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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['filename']) && $_FILES['filename']['error'] == UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['filename']['tmp_name'];
      $fileName = $_FILES['filename']['name'];
      $fileSize = $_FILES['filename']['size'];
      $fileType = $_FILES['filename']['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

      $allowedfileExtensions = array('jpg', 'jpeg', 'png');
      if (in_array($fileExtension, $allowedfileExtensions)) {

        $uploadFileDir = 'storage/';
        $dest_path = $uploadFileDir . $newFileName;

        if (!is_dir($uploadFileDir)) {
          mkdir($uploadFileDir, 0755, true);
        }

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
          echo 'File is successfully uploaded.';
        } else {
          echo 'There was some error moving the file to the upload directory. Please make sure the upload directory is writable by the web server.';
        }
      } else {
        echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
      }
    } else {
      echo 'There was some error in the file upload. Please check the following error.<br>';
      echo 'Error:' . $_FILES['filename']['error'];
    }
  }
} catch (Exception $e) {
  error_log($e->getMessage(), 3, 'storage/error.log');

  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => 'Gagal mengubah data'
  ];
}
header('Location: ./index.php');
