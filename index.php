<?php
// Contoh logika PHP untuk menyertakan file konfigurasi atau memproses data
// include 'config.php';
// $data = getDataFromDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styling.css">
    <title>JKT48 Fan Page</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo">
            <img src="assets/logo.webp" alt="JKT48 Logo">
        </a>

        <nav class="navbar">
            <a href="">HOME</a>
            <a href="membersPage.php">MEMBERS</a>
        </nav>
    </header>
    
    <main>
        <section class="content">
            <div class="main-home">
                <h1>Welcome to JKT48 Fan Page</h1>
                <p>JKT48 is an Indonesian idol group formed in Jakarta, Indonesia, 
                   as the first overseas sister group of the Japanese idol group AKB48.
                   The group is named after Jakarta, the capital city of Indonesia.</p>
                <p>JKT48 follows the concept of "idols you can meet,"
                   where fans can attend theater performances and handshake events to interact with the members.</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/official.JKT48/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://x.com/officialJKT48" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.instagram.com/jkt48/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@JKT48" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="main-img">
                <img src="assets/main.svg" alt="JKT48 Main Image">
            </div>
        </section>

        <section class="slider-section">
            <div class="container">
                <div class="slide">
                    <div class="item" style="background-image: url(assets/satu.png);">
                        <div class="content">
                            <div class="name">JKT48</div>
                            <div class="des">Idol group sensation.</div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(assets/t.png);">
                        <div class="content">
                            <div class="name">JKT48</div>
                            <div class="des">Energetic performances and songs.</div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(assets/tiga.png);">
                        <div class="content">
                            <div class="name">JKT48</div>
                            <div class="des">Indonesian pop culture icon.</div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(assets/satu.png);">
                        <div class="content">
                            <div class="name">JKT48</div>
                            <div class="des">Vibrant and youthful performances.</div>
                        </div>
                    </div>
                    <div class="item" style="background-image: url(assets/satu.png);">
                        <div class="content">
                            <div class="name">JKT48</div>
                            <div class="des">Inspiring fans nationwide daily.</div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </section>
    </main>

    <script src="index.js"></script>
</body>
</html>