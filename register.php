<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="registyle.css">
    <title>Registration</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="register-container" id="register">
                <div class="top">
                    <header>Registrate Here</header>
                </div>
                <?php
                include 'db_member/db_koneksi.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $fullname = $_POST['fullname'];
                    $numberphone = $_POST['numberphone'];  // Ubah sesuai dengan form HTML
                    $email = $_POST['email'];
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    $sql = "INSERT INTO pengguna (username, nama_lengkap, no_telepon, email, password) VALUES ('$username', '$fullname', '$numberphone', '$email', '$password')";

                    if ($koneksi->query($sql) === TRUE) {
                        echo "<script>alert('Registration successful');</script>";

                    } else {
                        echo "<p>Error: " . $sql . "<br>" . $koneksi->error . "</p>";
                    }

                    $koneksi->close();
                }
                ?>
                <form action="register.php" method="POST">
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="username" placeholder="Username" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="fullname" placeholder="Full Name" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" name="numberphone" placeholder="Number Phone" required>  <!-- Ubah sesuai dengan akses di PHP -->
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" class="input-field" name="email" placeholder="Email" required>
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" name="password" placeholder="Password" required>
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <span>Have an account? <a href="login.php">Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
