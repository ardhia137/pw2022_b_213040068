<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/logo.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Detail Produk | HelthCare Solution</title>
</head>

<body>
    <?php
    session_start();
    require 'function.php';
    $id = addslashes($_GET['id']);
    $data = query('select * from kategori order by nama asc');
    $artikel = query("select * from berita where id = $id");
    // print_r($artikel);
    if (isset($_REQUEST['logout'])) {
        logout();
        echo "<script> Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Anda Telah Logout',
      }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = './login.php';
          }
      })
      </script>";
    }
    ?>
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
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="produk.php?halaman=1">semua</a></li>
                            <?php foreach ($data as $kategori) : ?>
                                <li><a class="dropdown-item" href="produk.php?kategori=<?= $kategori['id']  ?>&&halaman=1"><?= $kategori['nama'] ?></a></li>
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
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Akun</a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <li><a class='dropdown-item' href='#'>Keranjang</a></li>
                            <li><a class='dropdown-item' href='ganti-password.php'>Ganti Password</a></li>
                            <li><a class='dropdown-item' href='?logout'>Logout</a></li>
                        </ul>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
    <div class="berita" style="padding-top: 100px;">
        <center>
            <h1><?= $artikel[0]['judul'] ?></h1>
        <h5>Penulis : <?= $artikel[0]['penulis'] ?> | <?= $artikel[0]['tanggal_upload'] ?></h5>
        <img src="assets/<?= $artikel[0]['gambar'] ?>" alt="" srcset="" width="100%">
        </center>
       <div class="m-5">
       <?= htmlspecialchars_decode($artikel[0]['body']) ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="hit-api-corona.js"></script> -->
    <script src="script.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>