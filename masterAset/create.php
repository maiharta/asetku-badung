<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Data Aset</h1>
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
                <td><input class="form-control" type="text" name="namaAset" size="20" required></td>
              </tr>
              <tr>
                <td>Total Barang</td>
                <td><input class="form-control" type="text" name="totalBarang" size="20" required></td>
              </tr>
              <tr>
                <td>Select Lokasi Aset</td>
                <td>
                <select class="form-control" name="lokasiAset" required>
                    <?php
                    $lokasi = mysqli_query($connection, "select * from masterlokasi");
                    while ($l = mysqli_fetch_array($lokasi)) {
                    ?>
                      <option value="<?php echo $l['namaLokasi'] ?>"><?php echo $l['namaLokasi'] ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <!-- jenis aset auto select sesuai tipe aset -->
              <tr>
                <td>Tipe dan Jenis Aset</td>
                <td>
                <select class="form-control" name="tipeAset" required>
                    <?php
                    $tipe = mysqli_query($connection, "select * from mastertipeaset");
                    while ($t = mysqli_fetch_array($tipe)) {
                      $combinedValue = $t['namaTipeAset'] . ' (' . $t['jenisAset'] . ')';
                    ?> 
                      <option value="<?php echo $combinedValue ?>"><?php echo $combinedValue ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <!-- auto show -->
              <tr name="samsat" hidden>
                <td>Tanggal Samsat</td>
                <td><input class="form-control" type="date" name="samsat" size="20" required disabled></td>
              </tr>
              <tr>
                <td>Supplier</td>
                <td><input class="form-control" type="text" name="supplier" size="20" required></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="text" name="harga" size="20" required></td>
              </tr>
              <tr>
                <td>Tanggal Pembelian</td>
                <td><input class="form-control" type="date" name="tanggalPembelian" size="20" required></td>
              </tr>
              <tr>
                <td>Garansi</td>
                <td><input class="form-control" type="text" name="garansi" size="20" required></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="deskripsi" size="20" required></td>
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