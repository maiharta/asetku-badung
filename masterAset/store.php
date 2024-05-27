<?php
session_start();
require_once '../helper/connection.php';

$namaAset = $_POST['namaAset'];
$totalBarang = $_POST['totalBarang'];
$lokasiAset = $_POST['lokasiAset'];
$jenisAset = $_POST['jenisAset'];
$tipeAset = $_POST['tipeAset'];

$supplier = $_POST['supplier'];
$harga = $_POST['harga'];
$tanggalPembelian = $_POST['tanggalPembelian'];
$garansi = $_POST['garansi'];
$deskripsi = $_POST['deskripsi'];

function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

try {
    $query = mysqli_query($connection, "insert into dataaset(namaAset, totalBarang, lokasiAset, jenisAset, tipeAset, supplier, harga, tanggalPembelian, garansi, deskripsi) value('$namaAset', '$totalBarang', '$lokasiAset', '$jenisAset', '$tipeAset', '$supplier', '$harga', '$tanggalPembelian', '$garansi', '$deskripsi')");

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
