<?php
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2022_b_213040068') or die('KONEKSI GAGAL!!');
    return $conn;
}
function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Siapkan data $mahasiswa
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
    // return $result
}
function tambah($table,$data){
    $conn = koneksi();
    $npm = htmlspecialchars($data['npm']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);
    $query = "INSERT INTO $table VALUES('','$npm','$nama','$email','$jurusan','$gambar')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}
function hapus($id){
    $conn = koneksi();
    $query = "delete from mahasiswa where id = $id ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}