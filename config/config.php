<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "uas_perpustakaan";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi Database Gagal : " . mysqli_connect_error());
}
?>