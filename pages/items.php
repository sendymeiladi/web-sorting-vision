<?php

$alert = "";

if (isset($_POST['add'])) {
  $sql_tambah = "INSERT INTO items (name, topic, amount) VALUES ('{$_POST['name']}','{$_POST['topic']}','{$_POST['amount']}')";
  mysqli_query($db, $sql_tambah);

  $alert = "add";
}

if (isset($_GET['del'])) {
  $sql_hapus = "UPDATE items SET active ='0' WHERE id ='{$_GET['del']}'";
  mysqli_query($db, $sql_hapus);

  $alert = "del";
}

if (isset($_POST['edit'])) {
  $sql_ubah = "UPDATE items SET name = '{$_POST['name']}', topic = '{$_POST['topic']}', amount='{$_POST['amount']}' WHERE id='{$_POST['old_id']}'";
  mysqli_query($db, $sql_ubah);

  $alert = "edit";
}

$sql = "SELECT * FROM items WHERE active ='1'";
$result = mysqli_query($db, $sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Items</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Items</li>
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
          Items Sudah Ditambahkan
        </div>
      <?php } else if ($alert == "del") { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          Items Sudah Dihapus
        </div>
      <?php } else if ($alert == "edit") { ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Berhasil</h5>
          Items Sudah Diubah
        </div>
      <?php } ?>
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="d-flex">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                  Tambah Items
                </button>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Topic</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $row['topic'] ?></td>
                      <td><?php echo $row['amount'] ?></td>
                      <td><a href="?page=items-edit&id=<?php echo $row['id'] ?>" class="btn btn-warning">Ubah</a> <a href="?page=items&del=<?php echo $row['id'] ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>topic</th>
                    <th>Jumlah</th>
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

      <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>Tambah Items</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- /.modal-head -->

            <form method="POST" action="?page=items">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">topic</label>
                  <input type="text" class="form-control" name="topic" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">jumlah</label>
                  <input type="number" class="form-control" name="amount" value="0" >
                </div>

                <div class="modal-footer justify-content-end">
                  <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
  </section>
  <!-- /.content -->
  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>
</div>