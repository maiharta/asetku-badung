<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_aset = $_GET['id_aset'];
$query = mysqli_query($connection, "SELECT * FROM dataaset WHERE id_aset='$id_aset'");
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
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id_aset" value="<?= $row['id_aset'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td style="width: 15%;">Nama Aset</td>
                  <td><input class="form-control" type="text" name="namaAset" size="20" required value="<?= $row['namaAset'] ?>"></td>
                </tr>
                <tr>
                  <td>Total Barang</td>
                  <td><input class="form-control" type="text" name="totalBarang" size="20" required value="<?= $row['totalBarang'] ?>"></td>
                </tr>
                <tr>
                  <td>Select Lokasi Aset</td>
                  <td>
                    <select class="form-control" name="lokasiAset" id="lokasiAset" required>
                      <?php
                      $jenis = mysqli_query($connection, "select * from masterlokasi");
                      while ($j = mysqli_fetch_array($jenis)) {
                        $selected = ($j['namaLokasi'] == $row['lokasiAset']) ? 'selected' : '';
                      ?>
                        <option value="<?php echo $j['namaLokasi'] ?>" <?php echo $selected ?>><?php echo $j['namaLokasi'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Select Jenis Aset</td>
                  <td>
                    <select class="form-control" name="jenisAset" id="jenisAset" required>
                      <?php
                      $jenis = mysqli_query($connection, "select * from masterjenisaset");
                      while ($j = mysqli_fetch_array($jenis)) {
                        $selected = ($j['namaJenisAset'] == $row['jenisAset']) ? 'selected' : '';
                      ?>
                        <option value="<?php echo $j['namaJenisAset'] ?>" <?php echo $selected ?>><?php echo $j['namaJenisAset'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Select Tipe Aset</td>
                  <td>
                    <select class="form-control" name="tipeAset" id="tipeAset" required>
                      <?php
                      $jenis = mysqli_query($connection, "select * from mastertipeaset");
                      while ($j = mysqli_fetch_array($jenis)) {
                        $selected = ($j['namaTipeAset'] == $row['tipeAset']) ? 'selected' : '';
                      ?>
                        <option value="<?php echo $j['namaTipeAset'] ?>" <?php echo $selected ?>><?php echo $j['namaTipeAset'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr name="samsat" hidden>
                  <td>Tanggal Samsat</td>
                  <td><input class="form-control" type="text" name="samsat" size="20" required value="<?= $row['samsat'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Supplier</td>
                  <td><input class="form-control" type="text" name="supplier" size="20" required value="<?= $row['supplier'] ?>"></td>
                </tr>
                <tr>
                  <td>harga</td>
                  <td><input class="form-control" type="text" name="harga" size="20" required value="<?= $row['harga'] ?>"></td>
                </tr>
                <tr>
                  <td>Tanggal Pembelian</td>
                  <td><input class="form-control" type="date" name="tanggalPembelian" size="20" required value="<?= $row['tanggalPembelian'] ?>"></td>
                </tr>
                <tr>
                  <td>Garansi</td>
                  <td><input class="form-control" type="text" name="garansi" size="20" required value="<?= $row['garansi'] ?>"></td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td><input class="form-control" type="text" name="deskripsi" size="20" required value="<?= $row['deskripsi'] ?>"></td>
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