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
                  <input class="form-control" placeholder="Masukkan nama aset....." id="search" type="text" name="namaAset" size="20" required>
                  <div id="suggestion-box" style="position: absolute; background-color: #fff; overflow-y: auto; box-shadow: 0 2px 4px rgba(0,0,0,0.2); z-index: 1000;"></div>
                </td>
              </tr>

              <tr>
                <td>Biaya Maintenance</td>
                <td><input class="form-control" placeholder="Masukkan biaya maintenance....." type="text" name="biayaMt" size="20" required></td>
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
                <td><input class="form-control" placeholder="Masukkan keterangan....." type="text" name="keterangan" size="20" required></td>
              </tr>

              <tr>
                <td>Status</td>
                <td>
                  <select class="form-control" name="status" id="status" required>
                    <option value="">--Pilih Status Maintenance--</option>
                    <option value="Perbaikan">Perbaikan</option>
                    <option value="Selesai">Selesai</option>
                    <option value="RusakBerat">Rusak Berat</option>
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