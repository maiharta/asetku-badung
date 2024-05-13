<?php
session_start();
require_once '../helper/connection.php';

$namaLokasi = $_POST['namaLokasi'];

$query = mysqli_query($connection, "insert into masterlokasi(namaLokasi) value('$namaLokasi')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
