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
                <td>Nama Aset</td>
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
                    include('../helper/connection.php');
                    $jenis = mysqli_query($connection, "select * from masterLokasi");
                    while ($j = mysqli_fetch_array($jenis)) {
                    ?>
                      <option value="<?php echo $j['namaLokasi'] ?>"><?php echo $j['namaLokasi'] ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Select Jenis Aset</td>
                <td>
                  <select class="form-control" name="jenisAset" required>
                    <?php
                    include('../helper/connection.php');
                    $jenis = mysqli_query($connection, "select * from masterjenisaset");
                    while ($j = mysqli_fetch_array($jenis)) {
                    ?>
                      <option value="<?php echo $j['namaJenisAset'] ?>"><?php echo $j['namaJenisAset'] ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Select Tipe Aset</td>
                <td>
                  <select class="form-control" name="tipeAset" required>
                    <?php
                    include('../helper/connection.php');
                    $jenis = mysqli_query($connection, "select * from masterTipeAset");
                    while ($j = mysqli_fetch_array($jenis)) {
                    ?>
                      <option value="<?php echo $j['namaTipeAset'] ?>"><?php echo $j['namaTipeAset'] ?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Supplier</td>
                <td><input class="form-control" type="text" name="supplier" size="20" required></td>
              </tr>
              <tr>
                <td>harga</td>
                <td><input class="form-control" type="text" name="harga" size="20" required></td>
              </tr>
              <tr>
                <td>Tanggal Pembelian</td>
                <td><input class="form-control" type="date" name="tanggalPembelian" size="20" required></td>
              </tr>
              <tr>
                <td>garansi</td>
                <td><input class="form-control" type="text" name="garansi" size="20" required></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td><input class="form-control" type="text" name="deskripsi" size="20" required></td>
              </tr>

              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan">
                      
                  <!-- qr ga kegenerate -->
                  <?php
                  require '../vendor/autoload.php';

                  use SimpleSoftwareIO\QrCode\Generator;

                  $qrcode = new Generator;
                  $qrcode->size(80)->generate('Make a qrcode without Laravel!');
                  ?> 

                </td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>