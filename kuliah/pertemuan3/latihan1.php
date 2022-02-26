<?php
//pengulangan

// foreach (untuk array)

// for
// for ($i=0; $i < 5; $i++) { 
//     echo "hello world";
//     echo "<br>";
// }
// // while
// echo "<hr>";
// $i = 0;
// while($i<5){
//     echo "hello world";
//     echo "<br>";
//     $i++;
// }

// //do while
// echo "<hr>";
// $a = 0;
// do{
//     echo "hello world <br>";
//     // echo "<br>";
//     $a++;
// }while ($a < 5);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .warna-baris{
        background-color:grey ;
    }
    </style>
</head>
<body>
    <table border="1">
        <?php for ($i=1; $i <=5 ; $i++) :?>
        <?php if($i % 2 == 1):?>
            <tr class="warna-baris">
        <?php else :?>
            <tr>
        <?php endif?>
                <?php for ($j=1; $j <=5 ; $j++) :?>
                <td><?="$i, $j"?></td>
                <?php endfor?>
            </tr>
        <?php endfor?>
    </table>
</body>
</html>