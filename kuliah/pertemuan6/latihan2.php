<?php 
// $mahasiswa = [
//     ["Shandika Galih","040340023","shandikagalih@unpas.ac.id","Teknik Informatika"],
//     ["033040001","Doddy Ferdiansyah","doddy@gmail.com","Teknik Industri"],
// ]

//array asociative
//definisianya sama dengan array numerik
//key nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nrp"=>"040340023",
        "nama" => "Shandika Galih",
        "email"=>"shandikagalih@unpas.ac.id",
        "jurusan"=>"Teknik Informatika",
        "gambar"=> "download (1).jpg"
    ], 
    [
        "nama" => "Doddy Ferdiansyah",
        "nrp"=>"030340001",
        "email"=>"doddy@gmail.com",
        "jurusan"=>"Teknik Industri",
        "gambar"=> "download (2).jpg"
    ],
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $m) :?>
    <ul>
        <li> <img src="img/<?= $m['gambar'] ?>" alt=""></li>
        <li>Nama : <?= $m["nama"] ?></li>
        <li>NRP : <?= $m["nrp"] ?></li>
        <li>Jurusan : <?= $m["jurusan"] ?></li>
        <li>Email : <?= $m["email"] ?></li>
    </ul>
    <?php endforeach?>
</body>
</html>