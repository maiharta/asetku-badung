<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_akun = $_GET['id_akun'];
$query = mysqli_query($connection, "SELECT * FROM masteradmin WHERE id_akun='$id_akun'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Akun</h1>
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
              <input type="hidden" name="id_akun" value="<?= $row['id_akun'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="name" size="20" required value="<?= $row['name'] ?>"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="form-control" type="email" name="email" size="20" required value="<?= $row['email'] ?>"></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><input class="form-control" type="text" name="username" size="20" required value="<?= $row['username'] ?>"></td>
                </tr>
                <tr>
                  <td>Passwrod</td>
                  <td><input class="form-control" type="password" name="password" size="20" required value="<?= $row['password'] ?>"></td>
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