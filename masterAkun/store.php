<?php
session_start();
require_once '../helper/connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = hash('sha256', $password);

try {
  $query = mysqli_query($connection, "insert into masteradmin(name, email, username, password) value('$name', '$email', '$username', '$$hashed_password')");
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
