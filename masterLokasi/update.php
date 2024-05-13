<?php
session_start();
require_once '../helper/connection.php';

$id_lokasi = $_POST['id_lokasi'];
$namaLokasi = $_POST['namaLokasi'];

$query = mysqli_query($connection, "UPDATE masterlokasi SET namaLokasi = '$namaLokasi' WHERE id_lokasi = '$id_lokasi'");
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