<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_mt = $_GET['id_mt'];
$query = mysqli_query($connection, "SELECT * FROM datamt WHERE id_mt='$id_mt'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Maintenance</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id_mt" value="<?= $row['id_mt'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama Aset</td>
                  <td>
                    <select class="form-control" name="namaAset" required>
                      <?php
                      include('../helper/connection.php');
                      $jenis = mysqli_query($connection, "select * from dataaset");
                      while ($j = mysqli_fetch_array($jenis)) {
                      ?>
                        <option value="<?php echo $j['namaAset'] ?>"><?php echo $j['namaAset'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Biaya Maintenance</td>
                  <td><input class="form-control" type="text" name="biayaMt" size="20" required value="<?= $row['biayaMt'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal Mulai</td>
                  <td><input class="form-control" type="date" name="tanggalMulai" size="20" required value="<?= $row['tanggalMulai'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal selesai</td>
                  <td><input class="form-control" type="date" name="tanggalSelesai" size="20" required value="<?= $row['tanggalSelesai'] ?>"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><input class="form-control" type="text" name="status" size="20" required value="<?= $row['keterangan'] ?>"></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><input class="form-control" type="text" name="status" size="20" required value="<?= $row['status'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>