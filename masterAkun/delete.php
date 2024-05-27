<?php
session_start();
require_once '../helper/connection.php';

$id_akun = $_GET['id_akun'];

try {
    $result = mysqli_query($connection, "DELETE FROM masteradmin WHERE id_akun='$id_akun'");

    if (mysqli_affected_rows($connection) > 0) {
        $_SESSION['info'] = [
            'status' => 'success',
            'message' => 'Berhasil menghapus data'
        ];
    } else {
        throw new Exception('No rows affected');
    }
} catch (Exception $e) {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => $e->getMessage()
    ];
}

header('Location: ./index.php');
?>
