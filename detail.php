<?php
include 'db_member/db_koneksi.php';

if (isset($_GET['id_member'])) {
    $id_member = $_GET['id_member'];
    
    // Query untuk mendapatkan detail anggota
    $query = "SELECT * FROM detail_member WHERE id_member = $id_member";
    $result = mysqli_query($koneksi, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // Anggota ditemukan, tampilkan detailnya
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="membersStyle.css">
    <title>Detail Anggota</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo">
            <img src="assets/logo.webp" alt="">
        </a>
        <nav class="atas">
            <a href="index.php">BERANDA</a>
            <a href="membersPage.php">ANGGOTA</a>
        </nav> 
    </header>

    <section class="services" id="services">
        <h2 class="heading">Detail <span>Anggota</span></h2>
        <div class="services-container">
            <div class="services-box">
                <img src="assets/<?php echo $row['image']; ?>" alt="<?php echo $row['nama_member']; ?>">
                <h3><?php echo $row['nama_member']; ?></h3>
                <p><?php echo $row['jiko_member']; ?></p>
                <p>Generasi <?php echo $row['gen_member']; ?></p>
                <!-- Tambahkan detail lain jika diperlukan -->
            </div>
        </div>
    </section>
</body>
</html>
<?php
    } else {
        echo "Anggota tidak ditemukan.";
    }
    
    mysqli_free_result($result);
    mysqli_close($koneksi);
} else {
    echo "Tidak ada ID anggota yang diberikan.";
}
?>