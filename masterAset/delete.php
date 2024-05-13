<?php
session_start();
require_once '../helper/connection.php';

$id_aset = $_GET['id_aset'];

$result = mysqli_query($connection, "DELETE FROM dataaset WHERE id_aset='$id_aset'");

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
