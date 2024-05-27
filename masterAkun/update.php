<?php
session_start();
require_once '../helper/connection.php';

$id_akun = $_POST['id_akun'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$password = 'password';
$hashed_password = hash('sha256', $password);

try {
  $query = mysqli_query($connection, "UPDATE masteradmin SET name = '$name', email = '$email', username = '$username', password = '$hashed_password' WHERE id_akun = '$id_akun'");
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
