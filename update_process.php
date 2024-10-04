<?php
include 'db_member/db_koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_member = $_POST['id_member'];
    $nama_member = $_POST['nama_member'];
    $gen_member = $_POST['gen_member'];
    $jiko_member = $_POST['jiko_member'];

    // Proses upload gambar baru jika ada
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target_dir = "assets/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Update data dengan gambar baru
        $query = "UPDATE detail_member SET nama_member='$nama_member', gen_member='$gen_member', jiko_member='$jiko_member', image='$image' WHERE id_member=$id_member";
    } else {
        // Update data tanpa gambar baru
        $query = "UPDATE detail_member SET nama_member='$nama_member', gen_member='$gen_member', jiko_member='$jiko_member' WHERE id_member=$id_member";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data anggota berhasil diperbarui.');window.location='membersPage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>
