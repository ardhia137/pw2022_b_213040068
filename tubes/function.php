<?php
$koneksi = mysqli_connect("localhost", "root", "", "hcs");
function login($table, $data)
{
    global $koneksi;
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $query = "select * from $table where username = '$username' && password = '$password'";
    $result = mysqli_query($koneksi, $query);
    // return mysqli_fetch_assoc($result)['username'];
    return [mysqli_affected_rows($koneksi), $result];
}

function register($data, $table)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $username = htmlspecialchars($data['username']);
    $validasi = "select * from $table where email = '$email' && username = '$username'";
    mysqli_query($koneksi, $validasi);
    
    if (mysqli_affected_rows($koneksi) == 0) {
        if (array_key_exists('role', $data)) {
            $password = "staff_hcs";
            $role = htmlspecialchars($data['role']);
            $query = "insert into $table values ('','$nama','$username','$password','$email','$role')";
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
        } else {
            $password = htmlspecialchars($data['password']);
            $query = "insert into $table values ('','$nama','$username','$password','$email')";
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
        }
    } else {
        return 'Email Atau Username Sudah Digunakan!!';
    }
}
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function count_data(){
    global $koneksi;
    $staff = mysqli_query($koneksi,'select count(*) as total_staff from staff');
    $total_staff = mysqli_fetch_array($staff);
    $users = mysqli_query($koneksi,'select count(*) as total_users from users');
    $total_users = mysqli_fetch_array($users);
    return ['staff'=>$total_staff['total_staff'],'users'=>$total_users['total_users']];
}
function tambah_kategori($data){
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $query = "insert into kategori values ('','$nama')";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}
function logout(){
    $_SESSION = [];
    session_unset();
    session_destroy();
}
function ubah_password($table,$data){
    global $koneksi;
    $id = $data['id'];
    $password = htmlspecialchars($data['password_baru']);
    $query = "update $table set password = '$password' where id = '$id'";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}
function hapus($table,$id){
    global $koneksi;
    $query = "delete from $table where id='$id'";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}
function edit_kategori($data){
    global $koneksi;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $query = "update kategori set nama = '$nama' where id = '$id'";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}
function edit_staff($data){
    global $koneksi;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $role = htmlspecialchars($data['role']);
    $query = "update staff set nama = '$nama',role = '$role'  where id = '$id'";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambah_produk($data){
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $kategori = htmlspecialchars($data['kategori']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $harga = htmlspecialchars($data['harga']);
    $stok = htmlspecialchars($data['stok']);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "insert into produk values ('','$nama','$kategori','$deskripsi','$harga','$stok','$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

function edit_produk($data){
    global $koneksi;
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $kategori = htmlspecialchars($data['kategori']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $harga = htmlspecialchars($data['harga']);
    $stok = htmlspecialchars($data['stok']);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "update produk set id='$id',nama='$nama',id_kategori = '$kategori', deskripsi = '$deskripsi',harga='$harga',stok='$stok',gambar='$gambar' where id = '$id'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    // return mysqli_error($koneksi);

}

function tambah_berita($data){
    global $koneksi;
    $judul = htmlspecialchars($data['judul']);
    $body = htmlspecialchars($data['body']);
    $penulis = htmlspecialchars($data['penulis']);
    $tanggal_upload = date("d-m-Y");
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "insert into berita values ('','$judul','$body','$gambar','$tanggal_upload','$penulis')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

function edit_berita($data){
    global $koneksi;
    $id = htmlspecialchars($data['id']);
    $judul = htmlspecialchars($data['judul']);
    $body = htmlspecialchars($data['body']);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "update berita set id='$id',judul='$judul',body = '$body',gambar='$gambar' where id = '$id'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
    // return mysqli_error($koneksi);

}