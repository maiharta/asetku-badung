<?php
session_start();
require_once '../helper/connection.php';

$id_lokasi = $_POST['id_lokasi'];
$namaLokasi = $_POST['namaLokasi'];

try {
  $query = mysqli_query($connection, "UPDATE masterlokasi SET namaLokasi = '$namaLokasi' WHERE id_lokasi = '$id_lokasi'");
  if ($query) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil mengubah data'
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
