<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM dataaset");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Laporan Daftar Aset</h1>
        <a href="./laporanAsetPDF.php" class="btn btn-success">Download Laporan Aset</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped w-100">
                            <div>
                                <h3 style="text-align: center;">Daftar Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara</h3>
                                <img src="../assets/img/PemKab_Badung.png" alt="logo" width="100" />
                                <p style="font-weight: bold; height: 2px;">Provinsi <span style="font-weight: lighter;">: Bali</span></p>
                                <p style="font-weight: bold; height: 2px;">Kab./Kota <span style="font-weight: lighter;">: PEMERINTAHAN KABUPATEN BADUNG</span></p>
                                <p style="font-weight: bold; height: 2px;">Bidang : <span style="font-weight: lighter;">Gubernut/Bupati/Walikota</span></p>
                                <p style="font-weight: bold; height: 2px;">Unit Organisasi : <span style="font-weight: lighter;">Kecamatan Kuta Utara</span></p>
                                <p style="font-weight: bold; height: 2px;">Sub Unit Organisasi : <span style="font-weight: lighter;">Kecamatan Kuta Utara</span></p>
                                <p style="font-weight: bold;">U P B : <span style="font-weight: lighter;">Kecamatan Kuta Utara</span></p>
                                <p style="font-weight: bold;">No. Kode Lokasi : <span style="font-weight: lighter;">12.14.01.02.05.01.01</span></p>
                            </div>
                            <thead>
                                <tr>
                                    <th>Status Usul Aset</th>
                                    <th>Nomer Registrasi</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Aset</th>
                                    <th>Total Barang</th>
                                    <th>Lokasi Aset</th>
                                    <th>Tipe dan Jenis Aset</th>
                                    <th>Supplier</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Garansi</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_array($result)) :
                                ?>

                                    <tr>
                                        <td><?= $data['opsiAset'] ?></td>
                                        <td><?= $data['noRegister'] ?></td>
                                        <td><?= $data['kodeBarang'] ?></td>
                                        <td><?= $data['namaAset'] ?></td>
                                        <td><?= $data['totalBarang'] ?></td>
                                        <td><?= $data['lokasiAset'] ?></td>
                                        <td><?= $data['tipeAset'] ?></td>
                                        <td><?= $data['supplier'] ?></td>
                                        <td><?= $data['harga'] ?></td>
                                        <?php
                                        $originalDate = $data['tanggalPembelian'];

                                        $Pembelian = date("d-m-Y", strtotime($originalDate));
                                        ?>
                                        <td><?= $Pembelian ?></td>
                                        <td><?= $data['garansi'] ?></td>
                                        <td><?= $data['deskripsi'] ?></td>
                                    </tr>

                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
    if ($_SESSION['info']['status'] == 'success') {
?>
        <script>
            iziToast.success({
                title: 'Sukses',
                message: `<?= $_SESSION['info']['message'] ?>`,
                position: 'topCenter',
                timeout: 5000
            });
        </script>
    <?php
    } else {
    ?>
        <script>
            iziToast.error({
                title: 'Gagal',
                message: `<?= $_SESSION['info']['message'] ?>`,
                timeout: 5000,
                position: 'topCenter'
            });
        </script>
<?php
    }

    unset($_SESSION['info']);
    $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>