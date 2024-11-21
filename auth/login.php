<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include '../db/connect.php';
include '../function/auth.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = login($username, $password, $conn);
    //    mengalihkan halaman sesuai role
    if (isset($login['role'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role']     = $login['role'];
        $_SESSION['user_id'] = $login['user_id'];

        if ($login['role'] == 2) {
            header('Location: ../petugas/dashboard-petugas.php');
        } elseif ($login['role'] == 1) {
            header('Location: ../masyarakat/dashboard-masyarakat.php');
        }
    } else {
        echo "login gagal, cek password dan username anda!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .login {
        width: 100%;
        /* Tombol akan mengisi seluruh lebar container */
        max-width: 500px;
        /* Opsional, batasi lebar maksimum */
        padding: 10px 25px;
        /* Tambahkan padding untuk tampilan lebih bagus */
        border-radius: 10px;
        /* Tambahkan sudut melengkung */
        border: none;
        /* Hilangkan border default */
        background-color: #A5B68D;
        /* Ubah warna sesuai selera */
        color: white;
        /* Warna teks */
        font-size: 16px;
        /* Ukuran teks */
        cursor: pointer;
        /* Ganti kursor saat hover */
    }

    .bg-login {
        background-color: #E7CCCC;
    }
    .card-login{
        border-radius: 80rem;
    }
    .container {
        display: flex;
        justify-content: center;
        /* Memusatkan secara horizontal */
        align-items: center;
        /* Opsional: untuk vertikal */
        height: 100vh;
        /* Opsional: buat penuh layar */
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ResolveHub</title>
    <link rel="shortcut icon" href="../assets/flag-line.png" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/css/sb-admin-2.min.css">
</head>

<body class="bg-login">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class=" card-login row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">


                                <dotlottie-player src="https://lottie.host/37cf3477-0dae-4766-9b28-3f199f22984b/thncXoq2MU.json" background="transparent" speed="1" style="width: 500px; height: 500px" loop autoplay></dotlottie-player>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Hello Everyone👋🏻</h1>
                                        <h3 class="h6 text-gray 900">Kami Hadir untuk menampung semua keluhanmu</h3>
                                    </div>
                                    <form class="user" method="POST">

                                        <div class="form-group">
                                            <label class="label-control" for="Username">Username</label>
                                            <input type="text" name="username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control" for="Password">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Enter Password">
                                        </div>
                                        <button class="login" type="submit" name="login" class="btn btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

</body>

</html>