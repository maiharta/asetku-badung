<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM datamt");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Laporan Daftar Pemeliharan</h1>
    <a href="./laporanMaintenacePDF.php" class="btn btn-success">Download Laporan Pemeliharaan</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100">
              <div>
                <h3 style="text-align: center;">Daftar Pemeliharaan Barang Milik Daerah Kendaraan dan Peralatan Komputer Kantor Camat Kuta Utara</h3>
                <br/>
              </div>
              <thead>
                <tr>
                  <th>Nama Aset</th>
                  <th>Biaya Maintenance</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal selesai</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['namaAset'] ?></td>
                    <td><?= $data['biayaMt'] ?></td>
                    <?php
                    $originalDate = $data['tanggalMulai'];

                    $Mulai = date("d-m-Y", strtotime($originalDate));
                    ?>
                    <td><?= $Mulai ?></td>
                    <?php
                    $originalDate = $data['tanggalSelesai'];

                    $Selesai = date("d-m-Y", strtotime($originalDate));
                    ?>
                    <td><?= $Selesai ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td><?= $data['status'] ?></td>
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