<?php
session_start();
require_once '../helper/connection.php';

$id_aset = $_GET['id_aset'];

try {
  $result = mysqli_query($connection, "DELETE FROM dataaset WHERE id_aset='$id_aset'");

  if (mysqli_affected_rows($connection) > 0) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menghapus data'
    ];
  } else {
    throw new Exception('No rows affected');
  }
} catch (Exception $e) {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => $e->getMessage()
  ];
}
header('Location: ./index.php');
