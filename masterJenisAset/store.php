<?php
session_start();
require_once '../helper/connection.php';

$namaJenisAset = $_POST['namaJenisAset'];

$query = mysqli_query($connection, "insert into masterjenisaset(namaJenisAset) value('$namaJenisAset')");
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
