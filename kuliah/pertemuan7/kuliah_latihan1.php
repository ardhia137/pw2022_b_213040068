<?php 
//superglobals
//variable bawaan php yang bisa di akses di manapun
//bentuknya array associative
//$_GET
//$_POST
//$_SERVER

// $_GET = ['nama'=>"Shandika","email"=>"Shandika@gmail.com"];

// $_GET['nama'] = "Shandika";
// $_GET['email'] = "Shandika@gmail.com";
// var_dump($_GET);
?>

<!-- <h1>hallo, <?= $_GET['nama'] ?></h1> -->
<ul>
    <li>
        <a href="kuliah_latihan2.php?nama=orang&npm=213040068&email=orang@gmail.com">orang</a>
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=ripan&npm=213040045&email=ripan@gmail.com">ripan</a>
    </li>
    <li>
        <a href="kuliah_latihan2.php?nama=amar&npm=213040061&email=amar@gmail.com">amar</a>
    </li>
</ul>