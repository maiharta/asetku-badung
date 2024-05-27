<?php
session_start();
require_once '../helper/connection.php';

$id_jenisAset = $_POST['id_jenisAset'];
$namaJenisAset = $_POST['namaJenisAset'];

try {
  $query = mysqli_query($connection, "UPDATE masterjenisaset SET namaJenisAset = '$namaJenisAset' WHERE id_jenisAset = '$id_jenisAset'");
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
?>