<?php

$alert = "";

if (isset($_POST['add'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO user (username, password, name) VALUES ('{$_POST['username']}','$password', '{$_POST['nama_lengkap']}')";
  mysqli_query($db, $sql);

  $alert = "add";
}

if (isset($_GET['del'])) {
  $sql = "UPDATE user SET active ='0' WHERE id='{$_GET['del']}'";
  mysqli_query($db, $sql);

  $alert = "del";
}

if (isset($_POST['edit'])) {

  if ($_POST['password'] == "") {
    $sql = "UPDATE user SET username='{$_POST['username']}', name='{$_POST['nama_lengkap']}' WHERE id='{$_POST['old_id']}'";
  } else {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE user SET username='{$_POST['username']}', password='$password', name='{$_POST['nama_lengkap']}' WHERE id='{$_POST['old_id']}'";
  }

  mysqli_query($db, $sql);
  $alert = "edit";
}

$sql = "SELECT * FROM user WHERE active ='1'";
$result = mysqli_query($db, $sql);

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
            <li class="breadcrumb-item active">Pengguna</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php if ($alert == "add") { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          Pengguna Sudah Ditambahkan
        </div>
      <?php } else if ($alert == "del") { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          Pengguna Sudah Dihapus
        </div>
      <?php } else if ($alert == "edit") { ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          Pengguna Sudah Diubah
        </div>
      <?php } ?>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user">
                  Tambah Pengguna
                </button>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['name'] ?></td>
                      <td><a href="?page=user-edit&id=<?php echo $row['id'] ?>" class="btn btn-warning">Ubah</a> <a href="?page=user&del=<?php echo $row['id'] ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <div class="modal fade" id="add-user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Tambah Pengguna</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- /.modal-head -->

            <form method="POST" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap">
                </div>
                <!-- /.card-body -->

                <div class="modal-footer justify-content-end">
                  <button type="submit" class="btn btn-primary" name="add">tambah</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  </section>
  <!-- /.content -->
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>
</div>