<?php
include 'db_member/db_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['namaAnggota'])) {
    $namaAnggota = $_POST['namaAnggota'];
    $query = "SELECT * FROM detail_member WHERE nama_member LIKE '%$namaAnggota%'";
    
    $result = mysqli_query($koneksi, $query);
  
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<div class="search-result">';
            echo '<div class="services-box">';
            echo '<img src="assets/' . $row['image'] . '" alt="">';
            echo '<h3>' . $row['nama_member'] . '</h3>';
            echo '<p>' . $row['jiko_member'] . '</p>';
            echo '<p>Generasi ' . $row['gen_member'] . '</p>';
            echo '<div class="dropdown-content">';
            echo '<a href="#">Edit</a>';
            echo '<a href="#">Delete</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada anggota yang ditemukan.";
    }

    mysqli_free_result($result);
    mysqli_close($koneksi);
}
?>
