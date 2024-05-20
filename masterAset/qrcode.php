<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
require_once '../vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

$id_aset = $_GET['id_aset'];
$query = mysqli_query($connection, "SELECT * FROM dataaset WHERE id_aset='$id_aset'");
$data = mysqli_fetch_assoc($query);

$qrquery = "Nama Aset         : {$data['namaAset']}
Total Barang      : {$data['totalBarang']}
Lokasi Aset       : {$data['jenisAset']}
Jenis Aset        : {$data['tipeAset']}
Tipe Aset         : {$data['lokasiAset']}
Supplier          : {$data['supplier']}
Harga             : {$data['harga']}
Tanggal Pembelian : {$data['tanggalPembelian']}
Garansi           : {$data['garansi']}
Deskripsi         : {$data['deskripsi']}";

$renderer = new ImageRenderer(
    new RendererStyle(200),
    new ImagickImageBackEnd()
);
$writer = new Writer($renderer);
$writer->writeFile($qrquery, 'qrcode.png');
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Ubah Data Aset</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <input type="hidden" name="id_aset" value="<?= $row['id_aset'] ?>">
                    <table cellpadding="8" class="w-50">
                        <tr>
                            <td>QR Code</td>
                        </tr>
                        <tr>
                            <td><img src="./qrcode.png" alt="QR Code"></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="./index.php" class="btn btn-danger ml-1">Kembali</a>
                            <td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>