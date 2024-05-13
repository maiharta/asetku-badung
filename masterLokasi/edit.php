<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_lokasi = $_GET['id_lokasi'];
$query = mysqli_query($connection, "SELECT * FROM masterlokasi WHERE id_lokasi='$id_lokasi'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Nama Tempat Aset</h1>
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
              <input type="hidden" name="id_lokasi" value="<?= $row['id_lokasi'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama Tempat Lokasi Aset</td>
                  <td><input class="form-control" type="text" name="namaLokasi" size="20" required value="<?= $row['namaLokasi'] ?>"></td>
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