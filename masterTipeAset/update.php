<?php
session_start();
require_once '../helper/connection.php';

$id_tipeAset = $_POST['id_tipeAset'];
$namaTipeAset = $_POST['namaTipeAset'];
$jenisAset = $_POST['jenisAset'];

$query = mysqli_query($connection, "UPDATE mastertipeaset SET namaTipeAset = '$namaTipeAset', jenisAset = '$jenisAset'  WHERE id_tipeAset = '$id_tipeAset'");
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