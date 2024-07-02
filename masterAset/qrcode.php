<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_aset = $_GET['id_aset'];
$query = mysqli_query($connection, "SELECT * FROM dataaset WHERE id_aset='$id_aset'");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Data Aset dan QR Code</h1>
        <a href="./index.php" class="btn btn-light">Kembali</a>
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
                                    <td style="width: 15%;">Status Usul Aset</td>
                                    <td><input class="form-control" type="text" name="opsiAset" size="20" required value="<?= $row['opsiAset'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Nomer Register</td>
                                    <td><input class="form-control" type="text" name="noRegister" size="20" required value="<?= $row['noRegister'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Kode Barang</td>
                                    <td><input class="form-control" type="text" name="kodeBarang" size="20" required value="<?= $row['kodeBarang'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td>Nama Aset</td>
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
                                    <td>QR Code Download</td>
                                    <td><a href="qrpdf.php?id_aset=<?= $id_aset ?>" class="btn btn-success" download>Download QR Code</a></td>
                                </tr>
                                <tr>
                                    <td><img src="<?= $row['gambar'] ?>" alt="qrcode" /></td>
                                    <td><img style="width: 400px; height: auto;" src="<?= $row['fotoBukti'] ?>" alt="foto bukti"/></td>
                                </tr>

                                <tr>
                                    <td>
                                        <a href="./index.php" class="btn btn-danger">Kembali</a>
                                    </td>
                                </tr>

                            </table>
                        <?php } ?>
                    </form>
                    <tr>

                    </tr>
                </div>
            </div>
        </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>