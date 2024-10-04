<?php
include 'db_member/db_koneksi.php';

if (isset($_GET['id_member'])) {
    $id_member = $_GET['id_member'];
    $query = "SELECT * FROM detail_member WHERE id_member = $id_member";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID anggota tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="membersStyle.css">
    <title>Update Member</title>
</head>
<body>
    <section class="contact" id="contact">
        <h2 class="heading">Update <span>Members Data</span></h2>
        <form method="POST" action="update_process.php" enctype="multipart/form-data">
            <input type="hidden" name="id_member" value="<?php echo $row['id_member']; ?>">
            <div class="input-box">
                <input type="text" name="nama_member" placeholder="Nama Member" value="<?php echo $row['nama_member']; ?>" required>
                <input type="number" name="gen_member" placeholder="Gen Member" value="<?php echo $row['gen_member']; ?>" required> 
            </div>
            
            <div class="input-jiko">
                <input type="text" name="jiko_member" placeholder="Jiko Member" value="<?php echo $row['jiko_member']; ?>" required>
            </div> 
           
            <div class="input-box">
                <input type="file" name="image" id="fileToUpload">
                <input type="submit" value="Update Image" name="submit">
            </div>
        </form>
    </section>
</body>
</html>
