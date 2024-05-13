<?php
session_start();
require_once '../helper/connection.php';

$id_aset = $_POST['id_aset'];
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

$query = mysqli_query($connection, "UPDATE dataaset SET namaAset = '$namaAset', totalBarang = '$totalBarang', lokasiAset = '$lokasiAset', jenisAset = '$jenisAset', tipeAset = '$tipeAset', supplier = '$supplier', harga = '$harga', tanggalPembelian = '$tanggalPembelian', garansi = '$garansi', deskripsi = '$deskripsi'  WHERE id_aset = '$id_aset'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}