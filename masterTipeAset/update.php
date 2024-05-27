<?php
session_start();
require_once '../helper/connection.php';

$id_tipeAset = $_POST['id_tipeAset'];
$namaTipeAset = $_POST['namaTipeAset'];
$jenisAset = $_POST['jenisAset'];

try {
  $query = mysqli_query($connection, "UPDATE mastertipeaset SET namaTipeAset = '$namaTipeAset', jenisAset = '$jenisAset'  WHERE id_tipeAset = '$id_tipeAset'");
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