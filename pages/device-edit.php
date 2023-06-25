<?php
$sql = "SELECT * FROM device WHERE serial_number ='{$_GET['id']}'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perangkat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="?page=user">perangkat</a></li>
            <li class="breadcrumb-item active">Ubah Perangkat</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h5 class="m-0">Ubah Perangkat</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="?page=device">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nomor Seri</label>
                    <input type="hidden" value="<?php echo $data['serial_number'] ?>" name="old_serialnumber">
                    <input type="text" class="form-control" name="serial_number" value="<?php echo $data['serial_number'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $data['location'] ?>" required>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <a href="?page=device" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-warning" name="edit">Ubah</button>
                </div>
              </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
    </div>
  </section>
  <!-- /.content -->
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>
</div>