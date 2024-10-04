<?php
include 'db_member/db_koneksi.php';

$id_member = $_GET['id_member'];

$query = "DELETE FROM detail_member WHERE id_member='$id_member'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data member berhasil dihapus.');window.location='membersPage.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
