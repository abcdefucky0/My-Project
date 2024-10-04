<?php
include 'db_member/db_koneksi.php'; // Memanggil file koneksi database

// Pastikan koneksi berhasil dilakukan di db_koneksi.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Memeriksa apakah user_input dan password telah disubmit
    if (isset($_POST['user_input']) && isset($_POST['password'])) {
        $user_input = $_POST['user_input'];
        $password = $_POST['password'];

        // Lindungi dari serangan SQL injection
        $user_input = mysqli_real_escape_string($koneksi, $user_input);
        $password = mysqli_real_escape_string($koneksi, $password);

        // Query untuk memeriksa username, fullname, nomor telepon, atau email di database
        $sql = "SELECT * FROM pengguna WHERE username = '$user_input' OR nama_lengkap = '$user_input' OR no_telepon = '$user_input' OR email = '$user_input'";
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    // Jika login berhasil
                    session_start();
                    $_SESSION['username'] = $row['username']; // Simpan username ke session
                    header("Location: index.php"); // Ganti dengan halaman setelah login berhasil
                    exit;
                } else {
                    // Jika password salah
                    echo "<script>alert('Password salah');</script>";
                }
            } else {
                // Jika user_input tidak ditemukan
                echo "<script>alert('Username, Full Name, No Telepon, atau Email tidak ditemukan');</script>";
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }

        mysqli_close($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleLogin.css">
    <title>Login</title>
</head>
<body>
<section>
    <div class="login-box">
        <form id="loginForm" method="POST" action="">
            <h2>Login</h2>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="text" id="user_input" name="user_input" required>
                <label>Username, Full Name, No Telepon, or Email</label>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" id="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember" id=""> Remember Me </label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit">Login</button>
            <div class="register-link">
                <p>Don't Have An Account ? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
