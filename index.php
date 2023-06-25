<?php
session_start();

// Check is user logged in?
if(!isset($_SESSION['name'])) {
    // Go to login page
    header("Location: login");
    exit;
}

require "conf/database.php";

include "header.php";
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php
    include "topnav.php";
    include "sidebar.php";

    if (isset($_GET['page'])) {
      if (@!include("pages/" . $_GET['page'] . ".php")) {
        include "pages/dashboard.php";
      }
    } else {
      include "pages/dashboard.php";
    }
    include 'footer.php';
    ?>

  </div>


  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>

  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
      $("#vehicle-cat").DataTable({
        "responsive": true,
        "autoWidth": false,
        "lengthChange": false,
        "buttons": ["copy", "csv", "excel", "pdf", "colvis"]
      }).buttons().container().appendTo('#vehicle-cat_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>