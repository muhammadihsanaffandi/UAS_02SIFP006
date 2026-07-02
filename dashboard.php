<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: auth/login.php");

    exit;

}

$base = "";

include "config/config.php";

$totalBuku=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM buku"));

$totalAnggota=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM anggota"));

$totalPinjam=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM peminjaman
WHERE status='Dipinjam'"));

$totalKembali=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM peminjaman
WHERE status='Dikembalikan'"));

date_default_timezone_set("Asia/Jakarta");

$jam = date("H");

if ($jam >= 5 && $jam < 11) {

    $greeting = " Selamat Pagi";

} elseif ($jam >= 11 && $jam < 15) {

    $greeting = " Selamat Siang";

} elseif ($jam >= 15 && $jam < 18) {

    $greeting = " Selamat Sore";

} else {

    $greeting = " Selamat Malam";

}

$hari = [
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
];

$bulan = [
    1=>"Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
];

$tanggal = $hari[date("w")] . ", " .
            date("d") . " " .
            $bulan[date("n")] . " " .
            date("Y");

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | SIPERPUS</title>

    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<?php include "includes/navbar.php"; ?>

<div class="main">

    <?php include "includes/sidebar.php"; ?>

    <div class="content">

        <div class="welcome">

            <h1><?= $greeting; ?>, <?= $_SESSION['nama']; ?> </h1>

            <p>
                Selamat datang di Sistem Informasi Perpustakaan.
                Kelola seluruh data perpustakaan dengan lebih mudah,
                cepat, dan efisien.
            </p>

            <p style="margin-top:12px;color:#7893B3;font-weight:500;">

            <?= $tanggal; ?>

            </p>

        </div>

        <div class="dashboard-card">

            <div class="stat-card">

                <h3>📚 Total Buku</h3>

                <h2><?= $totalBuku['total']; ?></h2>

            </div>

            <div class="stat-card">

                <h3>👥 Total Anggota</h3>

                <h2><?= $totalAnggota['total']; ?></h2>

            </div>

            <div class="stat-card">

                <h3>📝 Peminjaman</h3>

                <h2><?= $totalPinjam['total']; ?></h2>

            </div>

            <div class="stat-card">

                <h3>📖 Dikembalikan</h3>

                <h2><?= $totalKembali['total']; ?></h2>

            </div>

        </div>

<div class="content-card">

    <h3>Menu Cepat</h3>

    <div class="quick-menu">

        <a href="buku/index.php" class="menu-box">

        <i class="fa-solid fa-book-open"></i>

            <span>Tambah Buku</span>

        </a>

        <a href="anggota/index.php" class="menu-box">

        <i class="fa-solid fa-users"></i>

            <span>Tambah Anggota</span>

        </a>

        <a href="peminjaman/index.php" class="menu-box">

        <i class="fa-solid fa-book-open-reader"></i>

            <span>Peminjaman</span>

        </a>

        <a href="report/index.php" class="menu-box">

        <i class="fa-solid fa-chart-column"></i>

            <span>Laporan</span>

        </a>

    </div>

</div>

<div class="content-card">

    <h3>Tentang SIPERPUS</h3>

    <p>

        SIPERPUS merupakan Sistem Informasi Perpustakaan yang digunakan
        untuk mengelola data buku, anggota, transaksi peminjaman,
        serta laporan secara lebih efektif dan terorganisir.

    </p>

</div>

</div>

</div>

<?php include "includes/footer.php"; ?>

<script>

function jam(){

const sekarang=new Date();

let h=String(sekarang.getHours()).padStart(2,'0');
let m=String(sekarang.getMinutes()).padStart(2,'0');
let s=String(sekarang.getSeconds()).padStart(2,'0');

document.getElementById("clock").innerHTML=h+":"+m+":"+s+" WIB";

}

setInterval(jam,1000);

jam();

</script>

</body>

</html>