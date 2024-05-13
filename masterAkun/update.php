<?php
session_start();
require_once '../helper/connection.php';

$id_akun = $_POST['id_akun'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connection, "UPDATE masteradmin SET name = '$name', email = '$email', username = '$username', password = '$password' WHERE id_akun = '$id_akun'");
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