<?php 

//variable lokal
// $x = 10;
// echo $x;
// echo "<hr>";

//variable global
// $x=10;

// function tampilX() {
//     global $x;
//     echo $x;
// }
// tampilX();
// echo "<hr>";
// superglobal
// variable global milik PHP
// merupakan array associative
// echo $_SERVER["SERVER_NAME"];
// echo "<hr>";

// $_GET
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
        <li>
            <a
                href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>