<?php 
require 'function.php';
$id = htmlspecialchars($_GET['id']);

if(hapus($id) > 0){
    echo "<script>
      alert('data berhasil di hapus');
      document.location.href = 'kuliah_latihan1.php';
    </script>";
  }else{
    echo "<script>
      alert('data gagal di hapus');
    </script>";
  }