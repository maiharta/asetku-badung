<?php
session_start();
require_once '../helper/connection.php';

$namaLokasi = $_POST['namaLokasi'];

try {
  $query = mysqli_query($connection, "insert into masterlokasi(namaLokasi) value('$namaLokasi')");
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