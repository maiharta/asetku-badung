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
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Data Aset dan QR Code</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- // Form -->
                    <form method="get">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <input type="hidden" name="id_aset" value="<?= $row['id_aset'] ?>">
                            <table cellpadding="8" class="w-100">
                                <tr>
                                    <td style="width: 15%;">Nama Aset</td>
                                    <td><input class="form-control" type="text" name="namaAset" size="20" required value="<?= $row['namaAset'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Total Barang</td>
                                    <td><input class="form-control" type="text" name="totalBarang" size="20" required value="<?= $row['totalBarang'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Select Lokasi Aset</td>
                                    <td><input class="form-control" type="text" name="lokasiAset" size="20" require value="<?= $row['lokasiAset'] ?>" disabled /></td>
                                </tr>
                                <tr>
                                    <td>Select Tipe Aset</td>
                                    <td><input class="form-control" type="text" name="tipeAset" size="20" require value="<?= $row['tipeAset'] ?>" disabled /></td>
                                </tr>
                                <?php
                                if (strtolower($row['tipeAset']) === 'mobil (kendaraan)' || strtolower($row['tipeAset']) === 'motor (kendaraan)' || strtolower($row['tipeAset']) === 'truck (kendaraan)') {
                                    echo '<tr name="samsat">';
                                } else {
                                    echo '<tr name="samsat" style="display:none;">';
                                }
                                ?>
                                <td>Tanggal Samsat</td>
                                <?php
                                $originalDate = $row['samsat'];

                                $Samsat = date("d-m-Y", strtotime($originalDate));
                                ?>
                                <td><input class="form-control" type="text" name="samsat" size="20" require value="<?= $Samsat ?>" disabled /></td>
                                </tr>
                                <tr>
                                    <td>Supplier</td>
                                    <td><input class="form-control" type="text" name="supplier" size="20" required value="<?= $row['supplier'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>harga</td>
                                    <td><input class="form-control" type="text" name="harga" size="20" required value="<?= $row['harga'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pembelian</td>
                                    <td><input class="form-control" type="date" name="tanggalPembelian" size="20" required value="<?= $row['tanggalPembelian'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Garansi</td>
                                    <td><input class="form-control" type="text" name="garansi" size="20" required value="<?= $row['garansi'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><input class="form-control" type="text" name="deskripsi" size="20" required value="<?= $row['deskripsi'] ?>" disabled></td>
                                </tr>

                                <tr>
                                    <td>QR Code</td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php

                                        $qrquery = "Nama Aset : {$row['namaAset']}
Total Aset : {$row['totalBarang']}
Lokasi Aset : {$row['lokasiAset']}
Tipe dan Jenis Aset : {$row['tipeAset']} {$row['samsat']}
Supplier : {$row['supplier']}
Harga : {$row['harga']}
Tanggal Pembelian : {$row['tanggalPembelian']}
Garansi : {$row['garansi']}
Deskripsi : {$row['deskripsi']}";

                                        $renderer = new ImageRenderer(
                                            new RendererStyle(200),
                                            new ImagickImageBackEnd()
                                        );
                                        $writer = new Writer($renderer);
                                        $file_direction = 'storage/qrcode.png';
                                        $writer->writeFile($qrquery, $file_direction);

                                        $qrCode = $writer->writeString($qrquery);
                                        ?>
                                        <img src="./storage/qrcode.png" alt="qrcode">
                                    </td>
                                    <td><a href="./qrpdf.php" class="btn btn-light">Download PDF</a></td>
                                </tr>

                            </table>
                        <?php } ?>
                    </form>
                    <tr>
                        <td>
                            <form action="delete_image.php" method="post" style="display: inline;">
                                <input type="hidden" name="file_path" value="<?php echo $file_direction; ?>">
                                <button type="submit" class="btn btn-danger">Kembali</button>
                            </form>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>