<?php

$sql = "SELECT serial_number, location FROM device ORDER BY location ASC;";
$result = mysqli_query($db, $sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 d-flex justify-content-center">
        <div class="col-sm-3" style="text-align: center;">
          <h1>Hasil Perhitungan</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="card text-white bg-danger mb-3 " style="max-width: 25rem;">
            <div class="card-header" style="text-align: center;"><h2>TOMAT S</h2></div>
            <div class="card-body">
              <h1 style="text-align: center;" id="tomats">0</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-white bg-success mb-3" style="max-width: 25rem;">
            <div class="card-header" style="text-align: center;"><h2>TOMAT A</h2></div>
            <div class="card-body">
              <h1 style="text-align: center;" id="tomata">0</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
            <div class="card-header" style="text-align: center;"><h2>TOMAT B</h2></div>
            <div class="card-body">
            <h1 style="text-align: center;" id="tomatb">0</h1>
            </div>
          </div>
        </div>
    </div>
  </section>

  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>
</div>