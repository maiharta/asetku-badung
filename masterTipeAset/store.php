<?php
session_start();
require_once '../helper/connection.php';

$namaTipeAset = $_POST['namaTipeAset'];
$jenisAset = $_POST['jenisAset'];

try {
  $query = mysqli_query($connection, "insert into mastertipeaset(namaTipeAset, jenisAset) value('$namaTipeAset', '$jenisAset')");
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