<?php
    //definisikan sisi kubus
    $a = 9;
    $b = 4;

    // hitung sisi kubus
    $volume_a = pow($a,3);
    $volume_b = pow($b,3);
    $hasil = $volume_a + $volume_b;

    //kembalikan nilai hasil
    echo "jumlah dari volume kubus A dengan sisi $a dan B dengan sisi $b adalah $hasil";


    //deklarasi / definisi function
    function volume($a,$b){
        $volume_a = pow($a,3);
        $volume_b = pow($b,3);
        $hasil = $volume_a + $volume_b;
        return "jumlah dari volume kubus A dengan sisi $a dan B dengan sisi $b adalah $hasil";
    }
    
    echo "<hr>";
    //memanggil/mengeksekusi function
    echo volume(10,11);
    echo "<br>";
    echo volume(5,6);
    echo "<br>";
    echo volume(10,20);
    
    echo "<hr>";
    function segitiga($a,$t){
        $hasil = 1/2 * $a * $t;
        return "hasil luas segitiga dengan alas  $a dan tinggi $t adalah $hasil";
    }

    echo segitiga(2,4);

    
    