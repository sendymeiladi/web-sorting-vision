<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$pesan = "Masukkan Username dan Password";

if (isset($_POST['login'])) {
  require "conf/database.php";

  $sql = "SELECT * FROM user WHERE username='{$_POST['username']}' AND active='1'";
  $data = mysqli_fetch_array(mysqli_query($db, $sql));

  if ($data) {
    if (password_verify($_POST['password'], $data['password'])) {
      $_SESSION['name'] = $data['name'];
      header("Location: index");
    } else {
      $pesan = "Password Salah";
    }
  } else {
    $pesan = "Username Tidak Terdaftar";
  }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SortingVision | Smart Sorting</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/NusabotLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1">Smart<b>Sorting</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><?php echo $pesan; ?></p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>
</body>

</html>