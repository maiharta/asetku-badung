<?php
session_start();
require_once '../helper/connection.php';

$namaAset = $_POST['namaAset'];
$biayaMt = $_POST['biayaMt'];
$tanggalMulai = $_POST['tanggalMulai'];
$tanggalSelesai = $_POST['tanggalSelesai'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

try {
  $query = mysqli_query($connection, "insert into datamt(namaAset, biayaMt, tanggalMulai, tanggalSelesai, keterangan, status) value('$namaAset', '$biayaMt', '$tanggalMulai', '$tanggalSelesai', '$keterangan', '$status')");
  if ($query) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menambah data'
    ];
  } else {
    throw new Exception(mysqli_error($connection));
  }
} catch (Exception $e) {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => $e->getMessage()
  ];
}
header('Location: ./index.php');
?>