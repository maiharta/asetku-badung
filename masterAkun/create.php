<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Akun</h1>
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
                <td style="width: 15%;">Nama</td>
                <td><input class="form-control" placeholder="Masukkan nama....." type="text" name="name" size="20" required></td>
              </tr>

              <tr>
                <td>Email</td>
                <td><input class="form-control" placeholder="Masukkan Email....." type="email" name="email" size="20" required></td>
              </tr>

              <tr>
                <td>Username</td>
                <td><input class="form-control" placeholder="Masukkan Username....." type="text" name="username" size="20" required></td>
              </tr>

              <tr>
                <td>Password</td>
                <td>
                  <input id="password" placeholder="Masukkan Password....." class="form-control" type="password" name="password" size="20" required>
                  <input type="checkbox" onclick="showHidePassword()">Show Password
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

<script>
  function showHidePassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

<?php
require_once '../layout/_bottom.php';
?>