<?php
//array associative
//array yang indexnya berupa String, yang berpasangan dengan nilainya
$mahasiswa = [
    [
        "nama"=>"muhammad ardhia nugraha",
        "nrp"=>"213040068",
        "email"=>"ardhi213040068@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika"
    ],
    [
        "nama"=>"iqbal maulana sidiq",
        "nrp"=>"213040061",
        "email"=>"iqbal213040061@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika"
    ],
    [
        "nama"=>"rivan",
        "nrp"=>"213040058",
        "email"=>"rivan213040061@mail.unpas.ac.id",
        "jurusan"=>"Teknik Inforamtika"
    ]
];

// var_dump($mahasiswa[1]['email']);

?>
  <?php foreach ($mahasiswa as $key) :?>
        <ul>
          <li>Nama : <?= $key['nama']?></li>
          <li>NPM : <?= $key['nrp']?></li>
          <li>Email : <?= $key['email']?></li>
          <li>Jurusan : <?= $key['jurusan']?></li>
        </ul>
    <?php endforeach?>
    