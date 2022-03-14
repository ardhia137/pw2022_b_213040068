<?php
    $mahasiswa = [["Shandika Galih","040340023","Teknik Informatika","shandikagalih@unpas.ac.id"],
    ["Doddy Ferdiansyah","030340001","Teknik Industri","doddy@yahoo.com"],
    ["Erik","020340123","Teknik Planologi","erik@gmail.com"]];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) :?>
        <ul>
          <li>Nama : <?= $mhs[0]?></li>
          <li>NPM : <?= $mhs[1]?></li>
          <li>Email : <?= $mhs[2]?></li>
          <li>Jurusan : <?= $mhs[3]?></li>
        </ul>
    <?php endforeach?>
</body>

</html>