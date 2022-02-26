<?php
    //pertemuan 2, belajar sintaks php
    
    // nilai
    // angka (integer), tulisan(string), true/false (bool)
    echo "aku ganteng "; //str
    echo "<br>"; //buat turun ke bawah
    echo 10; //int
    echo "<br>"; //buat turun ke bawah
    echo true; //bool
    echo "<hr>";

    // variable adalah tempat menampung nilai
    // boleh mengandung angka, tetapi tidak boleh di awali dengan angka
    // tidak boleh ada spasi
    $nama = "pukimen";
    echo $nama; 
    echo "<hr>";

    // string
    // ' ', ""
    $hari = "jum'at";
    echo $hari;
    echo "<hr>";
    echo 'pukimen : "nama kamu siapa?"';
    echo "<br>";
    echo 'pukimen : "selamat hari jum\'at"';
    echo "<br>";
    echo "pukimen : \"selamat hari jum'at\"";
    echo "<br>";

    // interpolasi
    // mencetak langsung isi variable
    // hanya bisa oleh " "
    echo "hello nama saya $nama";
    echo "<hr>";
    //concat / penghubung string
    // menggunakan .
    $nama_depan = "sutarjo";
    $nama_belakang = "pukimen";
    echo $nama_depan ." ". $nama_belakang;
    echo "<br>";
    echo $nama_depan.': "selamat' . " hari jum'at\"";
    echo "<hr>";

    //oprator
    //aritmatika
    // +, -, *, /, % (modulus)
    $penjumlahan = 1+1;
    echo "hasil dari 1+1 adalah ". $penjumlahan;
    echo  "<br>";
    echo (1+2)*3-4;
    echo  "<br>";
    echo 10%5;
    echo  "<br>";
    echo 1 + "1";
    echo  "<hr>";

    // oprator perbandingan
    // <, >, <=, >=, ==, !=
    echo 1<5;
    echo  "<br>";
    echo 1=='1';
    echo  "<hr>";
    
    //identitas / strict comparison
    // === ,!==
    echo 1==="1";
    echo  "<hr>";

    //increment / daecrement
    //tambah / kurang 1
    //++, --
    $x = 10;
    echo ++$x;
    echo  "<br>";
    echo $x;