<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_tipeAset = $_GET['id_tipeAset'];
$query = mysqli_query($connection, "SELECT * FROM mastertipeaset WHERE id_tipeAset='$id_tipeAset'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Tipe Aset</h1>
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
              <input type="hidden" name="id_tipeAset" value="<?= $row['id_tipeAset'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td style="width: 15%;">Nama Tipe Aset</td>
                  <td><input class="form-control" type="text" name="namaTipeAset" size="20" required value="<?= $row['namaTipeAset'] ?>"></td>
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