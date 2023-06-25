<?php
$sql = "SELECT * FROM user WHERE id ='{$_GET['id']}'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="?page=user">Pengguna</a></li>
            <li class="breadcrumb-item active">Ubah Pengguna</li>
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
              <h5 class="m-0">Ubah Pengguna</h5>
            </div>
            <div class="card-body">
              <form method="POST" action="?page=user">
                <div class="card-body">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" value="<?php echo $data['id'] ?>" name="old_id">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['name'] ?>">
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <a href="?page=user" class="btn btn-danger">Batal</a>
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