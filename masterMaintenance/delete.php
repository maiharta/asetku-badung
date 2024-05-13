<?php
session_start();
require_once '../helper/connection.php';

$id_mt = $_GET['id_mt'];

$result = mysqli_query($connection, "DELETE FROM datamt WHERE id_mt='$id_mt'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
