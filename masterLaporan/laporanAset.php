<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

// $result = mysqli_query($connection, "SELECT * FROM dataaset");
?>

<section class="section">
    <div class="section-header d-flex justify-content-between">
        <h1>Laporan Daftar Aset</h1>
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

                            <?php
                            $tipeAset = isset($_POST['tipeAset']) ? $_POST['tipeAset'] : '';

                            if (isset($_POST['reset'])) {   
                                $tipeAset = 'noFilter';
                            }
                            ?>

                            <form method="POST" action="">
                                <div class="form-inline">
                                    <label>Tipe dan Jenis Aset : </label>
                                    <select class="form-control" name="tipeAset">
                                        <option value="noFilter" <?php echo ($tipeAset == 'noFilter') ? 'selected' : ''; ?>>Tanpa Filter</option>
                                        <option value="Komputer" <?php echo ($tipeAset == 'Komputer') ? 'selected' : ''; ?>>Komputer</option>
                                        <option value="Kendaraan" <?php echo ($tipeAset == 'Kendaraan') ? 'selected' : ''; ?>>Kendaraan</option>
                                    </select>
                                    <div style="padding-left: 5px;">
                                        <button class="btn btn-primary" name="filter">Filter</button>
                                    </div>
                                    <div style="padding-left: 5px;">
                                        <button class="btn btn-danger" name="reset" type="submit">Reset</button>
                                    </div>
                                    <div style="padding-left: 5px;">
                                        <button class="btn btn-success" name="generate_pdf" formaction="laporanAsetPDF.php">Download Laporan</button>
                                    </div>
                                </div>
                                <br />
                            </form>

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
                                <?php include 'filterLaporanAset.php' ?>
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