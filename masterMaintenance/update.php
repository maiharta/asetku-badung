<?php
session_start();
require_once '../helper/connection.php';

$id_mt = $_POST['id_mt'];
$namaAset = $_POST['namaAset'];
$biayaMt = $_POST['biayaMt'];
$tanggalMulai = $_POST['tanggalMulai'];
$tanggalSelesai = $_POST['tanggalSelesai'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

$query = mysqli_query($connection, "UPDATE datamt SET namaAset = '$namaAset', biayaMt = '$biayaMt', tanggalMulai = '$tanggalMulai', tanggalSelesai = '$tanggalSelesai', keterangan = '$keterangan', status = '$status'  WHERE id_mt = '$id_mt'");
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