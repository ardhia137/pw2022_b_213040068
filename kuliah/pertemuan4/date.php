<?php
    //date
    //untuk menampilkan tanggal dengan format tertentu
    echo date("l, d-M-Y");
    echo "<hr>";

    //time
    //unix timestamp / epoch time
    //detik yang sudah berlalu sejak 1 januari 1970
    echo time();
    echo "<br>";
    echo date("l", time()-60*60*24*100);
    echo "<hr>";

    //mktime
    //membuat sendiri detik
    //mktime(0,0,0,0,0,0,)
    //jam,menit, detik, bulan, tanggal, tahun
    echo date('l',mktime(0,0,0,8,25,1985));
    echo"<hr>";
    //strtotime
    echo date("l",strtotime("25 aug 1985"));
