<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM dataaset");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Data Aset</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>Nama Aset</th>
                  <th>Total Barang</th>
                  <th>Nama Lokasi Aset</th>
                  <th>Nama Jenis Aset</th>
                  <th>Nama Tipe Aset</th>
                  <th>Supplier</th>
                  <th>Harga</th>
                  <th>Tanggal Pembelian</th>
                  <th>Garansi</th>
                  <th>Deskripsi</th>
                  <th>QRcode</th>
                  <th style="width: 150">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['namaAset'] ?></td>
                    <td><?= $data['totalBarang'] ?></td>
                    <td><?= $data['lokasiAset'] ?></td>
                    <td><?= $data['jenisAset'] ?></td>
                    <td><?= $data['tipeAset'] ?></td>
                    <td><?= $data['supplier'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['tanggalPembelian'] ?></td>
                    <td><?= $data['garansi'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-info" href="qrcode.php?id_aset=<?= $data['id_aset'] ?>">
                        Lihat Qr Code</i>
                      </a>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_aset=<?= $data['id_aset'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id_aset=<?= $data['id_aset'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
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