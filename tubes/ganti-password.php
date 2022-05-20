<?php
session_start();
if (!isset($_SESSION["login"]) or $_SESSION['role'] != 'users') {
    header("Location: ./index.php");
    exit;
  }
require "./function.php";
if (isset($_POST['submit'])) {
    // echo $_SESSION['data']['password'];
    // echo $_POST['password_lama'];
  if ($_SESSION['data']['password'] == $_POST['password_lama']) {
    if ($_POST['password_baru'] == $_POST['retype_password_baru']) {
      $cek = ubah_password('users', $_POST);
      if ($cek > 0) {
        $_SESSION['data']['password'] = $_POST['password_baru'];
        echo " <script>
        alert('password berhasil diubah!');
        document.location.href = 'index.php';
    </script>";
      } else {
        echo "<script>alert('data gagal di ubah')</script>";
      }
    }else{
      echo "<script>alert('ketik ulang password dengan benar')</script>";
    }
  } else {
    echo "<script>alert('password lama salah')</script>";
  }
}
if (isset($_REQUEST['logout'])) {
    logout();
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm custom_navbar">
        <div class="container-fluid">
            <div class="row">
                <img src="assets/logo.png" alt="" class="nav-logo">
                <div class="col-8 ">
                    <div class="row">
                        <div class="col-20">
                            <h6 class="title">HCS</h6>
                        </div>
                        <div class="col-20  ">
                            <p class="sub">HelthCare Solution</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">semua</a></li>
                            <?php foreach ($data as $kategori) : ?>
                                <li><a class="dropdown-item" href="#"><?= $kategori['nama'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#experience">Berita</a>
                    </li>

                    <?php
                    // print_r($_SESSION);
                    if (!isset($_SESSION['login']) or $_SESSION['role'] != 'users') {
                        echo "<li class='nav-item'>
                        <a class='nav-link ' aria-current='page' href='./login.php'>Login</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Akun</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <li><a class='dropdown-item' href='#'>Keranjang</a></li>
                            <li><a class='dropdown-item active' href='ganti-password.php'>Ganti Password</a></li>
                            <li><a class='dropdown-item' href='?logout'>Logout</a></li>
                        </ul>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="ganti-password">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Ganti Password</h4>
                </div>
                <ul class="list-group">
                   <form action="" method="post">
                       <input type="hidden" name="id" value="<?= $_SESSION['data']['id'] ?>">
                   <label for="exampleInputEmail1">Password Lama</label>
                    <input type="password" id="gpsPassword" class="form-control" aria-describedby="passwordHelpBlock" name="password_lama" required>
                    <label for="inputPassword5" class="form-label">Password Baru</label>
                    <input type="password" id="gpsPassword" class="form-control" aria-describedby="passwordHelpBlock" name="password_baru" required>
                    <label for="inputPassword5" class="form-label">Retype Password Baru</label>
                    <input type="password" id="gpsPassword" class="form-control" aria-describedby="passwordHelpBlock" name="retype_password_baru" required>
                    <input type="submit" value="Submit" class="btn btn-primary" name="submit" style="width: 100px;">
                   </form>
                </ul>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-block m-auto " style="padding-top: 10px">
                    <div class="row">
                        <img src="assets/logo.png" alt="" class="nav-logo">
                        <div class="col-8 ">
                            <div class="row">
                                <div class="col-20">
                                    <h5>HCS</h5>
                                </div>
                                <div class="col-20  ">
                                    <h6>HelthCare Solution</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-block m-auto" style="padding-top: 20px">
                    <p>Social media Kami</p>
                    <ul>
                        <li><img src="assets/facebook.png" alt=""></li>
                        <li><img src="assets/instagram.png" alt=""></li>
                        <li><img src="assets/youtube.png" alt=""></li>
                    </ul>
                    <p style="margin-top: 10px;">Ikuti informasi seputar HCS<br>di social media kami</p>
                </div>
                <div class="col-md-3 d-block m-auto">
                    <p>Alamat<br>Jl. Dr. Setiabudi No.193, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153 </p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span>©2022. All RIght Reserved HelthCare Solution</span>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>