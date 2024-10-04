<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="membersStyle.css">
    <title>CRUD Project</title>
</head>
<body>
    <header class="header">
        <a href="" class="logo">
            <img src="assets/logo.webp" alt="">
        </a>

        <nav class="atas">
            <a href="index.php">HOME</a>
            <a href="">MEMBERS</a>
        </nav> 
    </header>

    <!-- Form untuk upload gambar -->
    <section class="contact" id="contact">
        <h2 class="heading">Add <span>Members Data</span></h2>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div class="input-box">
                <input type="text" name="nama_member" placeholder="Nama Member" required>
                <input type="number" name="gen_member" placeholder="Gen Member" required> 
            </div>
            
            <div class="input-jiko">
                <input type="text" name="jiko_member" placeholder="Jiko Member" required>
            </div> 
           
            <div class="input-box">
                <input type="file" name="image" id="fileToUpload" required>
                <input type="submit" value="Upload Image" name="submit">
            </div>
        </form>
    </section>

    <!-- Form search member -->
<section class="search_here">
    <h2 class="heading">Search Members <span>Name</span></h2>
    <form action="search.php" class="search" id="search-bar" method="POST">
        <input type="search" placeholder="Search......." class="search-input" name="namaAnggota">

        <div class="search-button" id="search-button">
            <i class="ri-search-2-line search-icon"></i>
            <i class="ri-close-line search-close"></i>
        </div>
        
    </form>

    <!-- Div untuk menampilkan hasil pencarian -->
    <div id="search-results" class="search-results">
        <!-- Hasil pencarian akan ditampilkan di sini -->
        <?php
// include 'db_member/db_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['namaAnggota'])) {
    $namaAnggota = $_POST['namaAnggota'];
    $query = "SELECT * FROM detail_member WHERE nama_member LIKE '%$namaAnggota%'";
    
    $result = mysqli_query($koneksi, $query);
    echo "<script>alert('Data dan gambar anggota baru berhasil ditambahkan.');window.location='membersPage.php';</script>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<div class="services-box">';
            echo '<img src="assets/' . $row['image'] . '" alt="">';
            echo '<h3>' . $row['nama_member'] . '</h3>';
            echo '<p>' . $row['jiko_member'] . '</p>';
            echo '<p>Generasi ' . $row['gen_member'] . '</p>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada anggota yang ditemukan.";
    }

    mysqli_free_result($result);
    mysqli_close($koneksi);
}
?>

    </div>
</section>


    <!-- Menampilkan data members -->
    <sxection class="services" id="services">
        <h2 class="heading">All <span>Members</span></h2>
        <div class="services-container">
            <?php
            include 'db_member/db_koneksi.php';

            // Query untuk mengambil semua data dari tabel
            $query = "SELECT * FROM detail_member";
            // Mengeksekusi query
            $result = mysqli_query($koneksi, $query);

            // Cek apakah ada baris data
            if (mysqli_num_rows($result) > 0) {
                // Menampilkan baris data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="services-box">';
                    echo '<img src="assets/' . $row['image'] . '" alt="">';
                    echo '<h3>' . $row['nama_member'] . '</h3>';
                    echo '<p>' . $row['jiko_member'] . '</p>';
                    echo '<p>Generasi ' . $row['gen_member'] . '</p>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="">Update Here <br> </a>';
                    echo '<a href="delete.php?id_member=' . $row['id_member'] . '">Delete <br> </a>';
                    echo '<a href="update.php?id_member=' . $row['id_member'] . '">Edit <br> </a>';
                    echo '<a href="detail.php?id_member=' . $row['id_member'] . '">Detail <br> </a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Tidak ada anggota yang ditemukan.";
            }

            mysqli_free_result($result);
            mysqli_close($koneksi);
            ?>
        </div>
    </sxection>

    <script src="script.js"></script>
    
</body>
</html>
