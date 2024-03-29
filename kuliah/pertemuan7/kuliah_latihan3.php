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

    <title>Daftar Mahasiswa</title>
</head>

<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <button class="btn btn-primary">+ Tambah Mahasiswa</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php  $i=1;?>
            <?php  $index=0;?>
            <?php foreach ($mahasiswa as $m) :?>
            <!-- <?php print_r($mahasiswa[1]) ?>     -->
                <tr class="align-middle">
                    <th scope="row"><?= $i++ ?></th>
                    <td><img src="<?= $m['gambar'] ?>" width="50px" class="rounded-circle"></td>
                    <td><?= $m['nama'] ?></td>
                    <td>
                        <a href="" class="btn badge bg-warning">edit</a>
                        <a href="" class="btn badge bg-danger">hapus</a>
                        <!-- <a href="kuliah_latihan4.php?nama=<?= $m['nama'] ?>&gambar=<?= $m['gambar'] ?>&nrp=<?= $m['nrp'] ?>&email=<?= $m['email'] ?>&jurusan=<?= $m['jurusan'] ?>" class="btn badge bg-info">detail</a> -->
                        <a href="kuliah_latihan4.php?index=<?= $index++ ?>" class="btn badge bg-info">detail</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
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