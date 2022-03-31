<?php
$mahasiswa = [
    [
        "nama"=>"muhammad ardhia nugraha",
        "nrp"=>"213040068",
        "email"=>"ardhi213040068@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika",
        "gambar"=>"https://asset-a.grid.id/crop/0x0:0x0/700x0/photo/2019/03/27/1294082232.jpg"
    ],
    [
        "nama"=>"iqbal maulana sidiq",
        "nrp"=>"213040061",
        "email"=>"iqbal213040061@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika",
        "gambar"=>"img/download (2).jpg"
        
    ],
    [
        "nama"=>"rivan",
        "nrp"=>"213040058",
        "email"=>"rivan213040061@mail.unpas.ac.id",
        "jurusan"=>"Teknik Industri",
        "gambar"=>"https://pbs.twimg.com/media/ELXZ9LbUUAA0BJz.jpg"
    ],
    [
        "nama"=>"ahmad ammar",
        "nrp"=>"213040050",
        "email"=>"ahmmad213040050@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika",
        "gambar"=>"img/download (3).jpg"
    ]
];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Detail Mahasiswa</title>
</head>

<body>
    <div class="container">
    
        <h1>Detail Mahasiswa</h1>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $mahasiswa[$_GET['index']]['gambar'] ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $mahasiswa[$_GET['index']]['nama'] ?></h5>
                        <p class="card-text"><?= $mahasiswa[$_GET['index']]['nrp'] ?></p>
                        <p class="card-text"><?= $mahasiswa[$_GET['index']]['email'] ?></p>
                        <p class="card-text"><?= $mahasiswa[$_GET['index']]['jurusan'] ?></p>
                        <a href="kuliah_latihan3.php">kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>