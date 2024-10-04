<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "data_member";

$koneksi = mysqli_connect($localhost, $username, $password, $dbname);
if(!$koneksi) {
    die("Gagal Terkoneksi");
} else {

}


?>