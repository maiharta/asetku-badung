<?php
session_start();
require_once '../helper/connection.php';

$namaTipeAset = $_POST['namaTipeAset'];
$jenisAset = $_POST['jenisAset'];

$query = mysqli_query($connection, "insert into mastertipeaset(namaTipeAset, jenisAset) value('$namaTipeAset', '$jenisAset')");
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
