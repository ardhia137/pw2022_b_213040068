<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/logo.png">
  <title>Dashboard | HelthCare Solution</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
 session_start();
 if (!isset($_SESSION["login"]) or $_SESSION['role'] != 'admin') {
     header("Location: ../login-staff.php");
     exit;
 }
require "../function.php";
if (isset($_POST['submit'])) {
    $cek = edit_staff($_POST);
    if ($cek> 0) {
      echo " <script> Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data Berhasil Diubah!!',
      }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = './staff.php';
          }
      })
      </script>";
    } else {
        echo "<script> Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Data Gagal Diubah!!',
        })</script>";
    }
}
if (isset($_REQUEST['logout'])) {
  logout();
  header('location:../login-staff.php');
}
$id = addslashes($_GET['id']);
$data = query("select * from staff where id = '$id'");
?>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="ubah_password.php" class="nav-link">Ubah Password</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="?logout" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light"><b>HCS</b></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['data']['username'] ?></a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
              <a href="index.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <?php if ($_SESSION['role'] == "admin") : ?>
                <ul class='nav nav-treeview'>
                  <li class='nav-item'>
                    <a href='tambah_staff.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Tambah Staff</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                    <a href='tambah_kategori.php' class='nav-link '>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Tambah Kategori</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                    <a href='tambah_produk.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Tambah Produk</p>
                    </a>
                  </li>
                </ul>
              <?php endif; ?>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tables
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <?php
              if ($_SESSION['role'] == "admin") : ?>
                <ul class='nav nav-treeview'>
                  <li class='nav-item'>
                    <a href='staff.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Staff</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                    <a href='users.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Users</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                    <a href='kategori.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Kategori</p>
                    </a>
                  </li>
                  <li class='nav-item'>
                    <a href='produk.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Produk</p>
                    </a>
                  </li>
                </ul>
              <?php endif ?>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Staff</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Staff</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Staff</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
              <input type="hidden" name="id" value="<?= $data[0]['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama" name="nama" value="<?= $data[0]['nama'] ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email" value="<?= $data[0]['email'] ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan username" name="username" value="<?= $data[0]['username'] ?>" disabled>
                  </div>
                  <div class="form-group">
                  <label>Role</label>
                  <select class="form-control select2" style="width: 100%;" name="role">
                    <option <?php echo ($data[0]['role'] == 'penulis')? "selected='selected'" : '' ?> value="penulis">penulis</option>
                    <option <?php echo ($data[0]['role'] == 'admin')? "selected='selected'" : '' ?> value="admin">admin</option>
                  </select>
                </div>
                  <input type="submit" value="Submit" class="btn btn-primary" name="submit">
              </form>
            </div>
            <!-- ./col -->
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../assets/plugins/moment/moment.min.js"></script>
  <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/dist/js/pages/dashboard.js"></script>
</body>

</html>