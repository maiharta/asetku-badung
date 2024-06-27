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
                  <td>Status Usul Aset</td>
                  <td>
                    <select class="form-control" name="opsiAset" id="opsiAset" required>
                      <option value="Hibah" <?php if ($row['opsiAset'] == "Hibah") {
                                                  echo "selected";
                                                } ?>>Hibah</option>
                      <option value="Pembelian" <?php if ($row['opsiAset'] == "Pembelian") {
                                                echo "selected";
                                              } ?>>Pembelian</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nomer Register</td>
                  <td><input class="form-control" type="text" name="noRegister" size="20" required value="<?= $row['noRegister'] ?>"></td>
                </tr>
                <tr>
                  <td>Kode Barang</td>
                  <td><input class="form-control" type="text" name="kodeBarang" size="20" required value="<?= $row['kodeBarang'] ?>"></td>
                </tr>
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
                      $lokasi = mysqli_query($connection, "select * from masterlokasi");
                      while ($l = mysqli_fetch_array($lokasi)) {
                        $selected = ($l['namaLokasi'] == $row['lokasiAset']) ? 'selected' : '';
                      ?>
                        <option value="<?php echo $l['namaLokasi'] ?>" <?php echo $selected ?>><?php echo $l['namaLokasi'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tipe dan Jenis Aset</td>
                  <td>
                    <select class="form-control" name="tipeAset" id="tipeAset" required>
                      <?php
                      $tipe = mysqli_query($connection, "select * from mastertipeaset");
                      while ($t = mysqli_fetch_array($tipe)) {
                        $combinedValue = $t['namaTipeAset'] . ' (' . $t['jenisAset'] . ')';
                        $selected = ($combinedValue == $row['tipeAset']) ? 'selected' : '';
                      ?>
                        <option value="<?php echo $combinedValue ?>" <?php echo $selected ?>><?php echo $combinedValue ?></option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>
                <?php
                if (strtolower($row['tipeAset']) === 'mobil (kendaraan)' || strtolower($row['tipeAset']) === 'motor (kendaraan)' || strtolower($row['tipeAset']) === 'truck (kendaraan)') {
                  echo '<tr name="samsat">';
                } else {
                  echo '<tr name="samsat" style="display:none;">';
                }
                ?>
                <td>Tanggal Samsat</td>
                <td><input class="form-control" type="date" name="samsat" size="20" require value="<?= $row['samsat'] ?>" /></td>
                </tr>
                <tr>
                  <td>Supplier</td>
                  <td><input class="form-control" type="text" name="supplier" size="20" required value="<?= $row['supplier'] ?>"></td>
                </tr>
                <tr>
                  <td>Harga</td>
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