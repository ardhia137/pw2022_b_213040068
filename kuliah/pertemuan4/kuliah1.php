<?php
    //FUNCTION - 4
    // built-in fucntion

    //date()
    //untuk mengetahui waktu saat ini
    // default timezone:UTC (-7)
    echo date('l, j-F-Y');
    echo '<hr>';
    echo date('l',time());
    echo '<hr>';
    
    // time()
    //unix timestamp/epoch time
    //detik yang sudah berlalu sejak 1 januari 1970
    echo time();
    echo '<br>';
    echo time()+60*60*24;
    echo '<hr>';
    
    //hari apa 100 hari kebelakang
    echo date('l',time()-60*60*24*100);
    echo '<hr>';
    
    //mktime()
    //membuat waktu berdasarkan format
    //mktime(0,0,0,0,0,0)
    //jam,menit,detik,bulan,tanggal,tahun
    echo mktime(10,45,0,3,5,2022);
    echo '<hr>';
    echo date("l",mktime(10,45,0,1,9,2003));
    echo '<hr>';
    echo strtotime('2 june 2003');
    echo '<br>';
    echo mktime(0,0,0,6,2,2003);
    echo '<hr>';
    
    //fungsi mtk
    //pow untuk pangkat
    echo pow(2,3);
    echo '<br>';
    //rand untuk bilangan random
    echo rand(1,10);
    echo '<br>';
    //round untuk pembulatan
    echo round(2,1); //pembulatan ke nilai terdekat
    echo '<br>';
    echo ceil(2,1); //pembulatan ke atas (ceiling / langit langit)
    echo '<br>';
    echo floor(2,1); //pembulatan ke bawah (floor/lantai)

    
    

    
