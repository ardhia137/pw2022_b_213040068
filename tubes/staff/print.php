<?php

require_once '../vendor/autoload.php';
require '../function.php';
$data = query("select produk.id,produk.nama,kategori.nama as kategori,produk.stok,produk.deskripsi,produk.harga,produk.gambar from produk ,kategori where produk.id_kategori = kategori.id");
$html = '<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>Data Produk</h2>

<table style="width:100%" border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th>
    </tr>';
    $i = 1;
    foreach ($data as $row) {
        $html .= ' <tr>
        <td>' .$i++.'</td>
        <td>'.$row["nama"].'</td>
        <td>'.$row["kategori"].'</td>
        <td>'.$row["harga"].'</td>
        <td>'.$row["stok"].'</td>
        <td><img src="../assets/'. $row["gambar"] . ' " alt="" width="150"></td>
    </tr>';
    }
$html.='</table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
