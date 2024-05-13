<?php
session_start();
require_once '../helper/connection.php';

$id_jenisAset = $_POST['id_jenisAset'];
$namaJenisAset = $_POST['namaJenisAset'];

$query = mysqli_query($connection, "UPDATE masterjenisaset SET namaJenisAset = '$namaJenisAset' WHERE id_jenisAset = '$id_jenisAset'");
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