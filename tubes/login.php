
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/logo.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login | HelthCare Solution</title>
</head>
<?php 
session_start();
require "function.php";
if(isset($_POST['submit'])){
    $cek = login('users',$_POST);
   if ( $cek[0] > 0) {
        $data =  mysqli_fetch_assoc($cek[1]);
        $_SESSION["login"] = true;
        $_SESSION["role"] = 'users';
        $_SESSION["data"] = $data;
       header("location:index.php");
    } else {
        echo "<script>
        alert('username atau password salah')
        </script>";
   }
}
?>
<body>
    <div class="login d-flex align-items-center">
        <div class="container">
            <div class="card ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 align-self-center" style="text-align: center;"  >
                            <img class="img-responsive" src="assets/login.jpg" alt="">
                        </div>
                        <div class="col-md-6">
                            <h2 class="mb-0">Welcome Back!</h2>
                            <p class="text-muted mb-4">Login HCS</p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                    <label for="passwrod">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                                </div>
                                <input type="submit" value="Login" name="submit">
                            </form>
                            <div class="mt-2 text-center">
                                <a href="register.php" class="text-muted" style="margin-right: 10px;">Belum Punya Akun?</a>
                                <a href="#" class="text-muted"> Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>