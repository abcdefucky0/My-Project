<?php
// Mengimpor koneksi database
include 'db_member/db_koneksi.php';

// Periksa apakah formulir telah dikirimkan
if (isset($_POST['submit'])) {
    $nama_member = $_POST['nama_member'];
    $gen_member = $_POST['gen_member'];
    $jiko_member = $_POST['jiko_member'];

    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Memproses gambar
        $image = $_FILES['image']['name'];
        // Ekstensi yang diperbolehkan
        $extensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        // Mengambil ekstensi file
        $x = explode('.', $image);
        $extensi = strtolower(end($x));
        // Cek ekstensi file    
        $file_tmp = $_FILES['image']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $image;
        // Validasi ekstensi file

        // Validasi ukuran file
        if (in_array($extensi, $extensi_diperbolehkan) === true) {
            // Memindahkan file ke direktori tujuan
            if (move_uploaded_file($file_tmp, 'assets/' . $nama_gambar_baru)) {
                // Menyimpan gambar ke database
                $query = "INSERT INTO detail_member (nama_member, image, gen_member, jiko_member) VALUES ('$nama_member', '$nama_gambar_baru', '$gen_member', '$jiko_member')";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                } else {
                    echo "<script>alert('Data dan gambar anggota baru berhasil ditambahkan.');window.location='membersPage.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar.');window.location='membersPage.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi gambar tidak diizinkan.');window.location='membersPage.php';</script>";
        }
    } else {
        echo "<script>alert('Harap pilih gambar untuk diunggah.');window.location='membersPage.php';</script>";
    }
}
?>
