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
    <title>HelthCare Solution</title>
</head>

<body>
    <?php
    session_start();
    require 'function.php';
    $data = query('select * from kategori order by nama asc');
    $produk = query('select * from produk order by nama asc limit 8');
    $artikel = query('select * from berita order by tanggal_upload limit 4');
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
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
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
                    <?php if (!isset($_SESSION['login']) or $_SESSION['role'] != 'users') : ?>
                        <li class='nav-item'>
                            <a class='nav-link ' aria-current='page' href='./login.php'>Login</a>
                        </li>
                    <?php else : ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Akun</a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                <li><a class='dropdown-item' href='#'>Keranjang</a></li>
                                <li><a class='dropdown-item' href='ganti-password.php'>Ganti Password</a></li>
                                <li><a class='dropdown-item' href='?logout'>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="landing-page">
        <div class="container">
            <div class="row r-landing-page ">
                <div class="col-md-5 d-block m-auto order-2 order-md-1">
                    <h4 class="t-landing-page">APA ITU <span style="color: #79D2F1;">HCS?..</span></h4>
                    <h4 class="sub-landing-page">HCS atau HelthCare Solution adalah sebuah Website untuk membeli obat secara online, serta sebagai platform untuk mengedukasi masyarkat akan pentingnya kesehatan.</h4>
                    <?php
                    if (!isset($_SESSION['login']) or $_SESSION['role'] != 'users') {
                        echo " <a href='register.php'> <button class='btn-register'>Daftar Sekarang</button></a>";
                    }
                    ?>
                </div>
                <div class="col-md-6 d-block m-auto order-1 order-md-2">
                    <img src="assets/landing-page.jpg" alt="" class="img-lp d-block m-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="produk">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Produk</h4>
                </div>
                <div class="col">
                    <a href="produk.php?halaman=1">
                        <h4 class="float-end" style="color: #79D2F1; font-size:20px;">Selengkapnya</h4>
                    </a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produk as $data) : ?>
                    <div class="col-lg-3 col-md-6 col-6">
                        <a href="detail-produk.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                        <div class="custom-card shadow bg-body ">
                            <img src="assets/<?= $data['gambar'] ?>" alt=" " class="d-block m-auto" />
                            <h5><?= $data['nama'] ?></h5>
                            <h6>Rp <?= number_format($data['harga']) ?></h6>
                        </div>
                    </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="data-covid">
        <div class="container">
            <h4>Data Covid</h4>
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="card-cvd shadow bg-body ">
                        <h5 class="t-data-covid d-flex justify-content-center">Terkonfirmasi</h5>
                        <h6 class="sub-data-covid d-flex justify-content-center" style="color:#F2C94C" id="terkonfirmasi"></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card-cvd shadow bg-body ">
                        <h5 class="t-data-covid d-flex justify-content-center" style="text-align: center;">Dalam Perawatan</h5>
                        <h6 class="sub-data-covid d-flex justify-content-center" style="color:#F5A623" id="dalam_perawatan"></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card-cvd shadow bg-body ">
                        <h5 class="t-data-covid d-flex justify-content-center">Sembuh</h5>
                        <h6 class="sub-data-covid d-flex justify-content-center" style="color:#219653" id="sembuh"></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="card-cvd shadow bg-body ">
                        <h5 class="t-data-covid d-flex justify-content-center">Meninggal</h5>
                        <h6 class="sub-data-covid d-flex justify-content-center" style="color:#D8232A" id="meninggal"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="artikel">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Artikel</h4>
                </div>
                <div class="col">
                    <a href="#">
                        <h4 class="float-end" style="color: #79D2F1; font-size:20px;">Selengkapnya</h4>
                    </a>
                </div>
            </div>
            <div class="row">
            <?php foreach ($artikel as $data) :?>
               <div class="col-lg-3 col-md-6 ">
               <a href="detail-berita.php?id=<?= $data['id'] ?>" style="text-decoration:none ;">
                    <div class="custom-card shadow bg-body ">
                        <img src="assets/<?= $data['gambar'] ?>" alt=" " class="d-block m-auto" />
                        <h5><?= $data['judul'] ?></h5>
                        <h6><?= $data['tanggal_upload'] ?></h6>
                    </div>
               </a>
                </div>
            <?php endforeach?>
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
    <script src="hit-api-corona.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>