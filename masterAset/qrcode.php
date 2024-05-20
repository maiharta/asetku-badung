<?php
session_start();
require_once '../helper/connection.php';
require '../vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

$renderer = new ImageRenderer(
    new RendererStyle(100),
    new ImagickImageBackEnd()
);
$writer = new Writer($renderer);
$writer->writeFile('testing png qr code', 'qrcode1.png');

// use BaconQrCode\Writer;
// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Image\SvgImageBackEnd;
// use BaconQrCode\Renderer\RendererStyle\RendererStyle;

// $result = mysqli_query($connection, "SELECT * FROM dataaset");

// while ($row = $result->fetch_all(PDO::FETCH_ASSOC)) {
//     // Concatenate all column data into a single string
//     $data = $row['namaAset'];
//     $data = $row['totalBarang'];
//     $data = $row['lokasiAset'];
//     $data = $row['jenisAset'];
//     $data = $row['tipeAset'];
//     $data = $row['supplier'];
//     $data = $row['harga'];
//     $data = $row['tanggalPembelian'];
//     $data = $row['garansi'];
//     $data = $row['deskripsi'];
//     $data = implode(", ", $row);

//     $renderer = new ImageRenderer(
//         new RendererStyle(400),
//         new SvgImageBackEnd()
//     );
//     $writer = new Writer($renderer);
//     $writer->writeFile($data, 'qrcodes/' . $data . '.svg'); // replace 'qrcodes/' with the path where you want to save your QR codes
// }

?>

<img src="./qrcode.png" alt="QR Code">