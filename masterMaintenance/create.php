<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Data Maintenance</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./store.php" method="POST">
            <table cellpadding="8" class="w-100">

              <tr>
                <td style="width: 15%;">Nama Aset</td>
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
                <td><input class="form-control" type="text" name="biayaMt" size="20" required></td>
              </tr>

              <tr>
                <td>Tanggal Mulai</td>
                <td><input class="form-control" type="date" name="tanggalMulai" size="20" required></td>
              </tr>

              <tr>
                <td>Tanggal Selesai</td>
                <td><input class="form-control" type="date" name="tanggalSelesai" size="20" required></td>
              </tr>

              <tr>
                <td>Keterangan</td>
                <td><input class="form-control" type="text" name="keterangan" size="20" required></td>
              </tr>

              <tr>
                <td>Status</td>
                <td>
                  <select class="form-control" name="status" id="status" required>
                    <option value="">--Pilih Status Maintenance--</option>
                    <option value="Perbaikan">Perbaikan</option>
                    <option value="Selesai">Selesai</option>
                  </select>
                </td>
              </tr>

            </table>
            </br>
            <tr>
              <td>
                <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
              </td>
            </tr>

          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>