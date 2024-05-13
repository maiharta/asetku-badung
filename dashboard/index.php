<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$dataAset = mysqli_query($connection, "SELECT COUNT(*) FROM dataaset");
$jenisAset = mysqli_query($connection, "SELECT COUNT(*) FROM masterjenisaset"); //change to total asset - maintenance asset
$maintenance = mysqli_query($connection, "SELECT COUNT(*) FROM datamt");
$lokasi = mysqli_query($connection, "SELECT COUNT(*) FROM masterlokasi");

$total_jenisAset = mysqli_fetch_array($jenisAset)[0];
$total_dataAset = mysqli_fetch_array($dataAset)[0]; //change to total asset - maintenance asset
$total_maintenance = mysqli_fetch_array($maintenance)[0];
$total_lokasi = mysqli_fetch_array($lokasi)[0];
?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Aset</h4>
            </div>
            <div class="card-body">
              <?= $total_dataAset ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Aset Aktif</h4>
            </div>
            <div class="card-body">
              <?= $total_jenisAset ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Aset mainteance</h4>
            </div>
            <div class="card-body">
              <?= $total_maintenance ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Lokasi Aset</h4>
            </div>
            <div class="card-body">
              <?= $total_lokasi ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>