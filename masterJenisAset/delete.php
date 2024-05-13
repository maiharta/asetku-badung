<?php
session_start();
require_once '../helper/connection.php';

$id_jenisAset = $_GET['id_jenisAset'];

$result = mysqli_query($connection, "DELETE FROM masterjenisaset WHERE id_jenisAset='$id_jenisAset'");

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
