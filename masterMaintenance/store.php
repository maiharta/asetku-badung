<?php
session_start();
require_once '../helper/connection.php';

$namaAset = $_POST['namaAset'];
$biayaMt = $_POST['biayaMt'];
$tanggalMulai = $_POST['tanggalMulai'];
$tanggalSelesai = $_POST['tanggalSelesai'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

$query = mysqli_query($connection, "insert into datamt(namaAset, biayaMt, tanggalMulai, tanggalSelesai, keterangan, status) value('$namaAset', '$biayaMt', '$tanggalMulai', '$tanggalSelesai', '$keterangan', '$status')");
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
