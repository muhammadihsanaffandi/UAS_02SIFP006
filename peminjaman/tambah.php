<?php

$base="../";

include "../config/auth.php";
include "../config/config.php";

$buku=mysqli_query($conn,"SELECT * FROM buku WHERE stok>0 ORDER BY judul ASC");
$anggota=mysqli_query($conn,"SELECT * FROM anggota ORDER BY nama ASC");

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Tambah Peminjaman</title>

<link rel="stylesheet" href="../assets/css/common.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/crud.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<?php include "../includes/navbar.php"; ?>

<div class="main">

<?php include "../includes/sidebar.php"; ?>

<div class="content">

<div class="page-header">

<h1>

<i class="fa-solid fa-book-open-reader"></i>

Tambah Peminjaman

</h1>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form action="proses_tambah.php" method="POST">

<div class="form-group">

<label>Buku</label>

<select name="id_buku" class="form-control" required>

<option value="">-- Pilih Buku --</option>

<?php while($b=mysqli_fetch_assoc($buku)){ ?>

<option value="<?= $b['id_buku']; ?>">

<?= $b['judul']; ?> (Stok : <?= $b['stok']; ?>)

</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Anggota</label>

<select name="id_anggota" class="form-control" required>

<option value="">-- Pilih Anggota --</option>

<?php while($a=mysqli_fetch_assoc($anggota)){ ?>

<option value="<?= $a['id_anggota']; ?>">

<?= $a['nama']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="form-group">

<label>Tanggal Pinjam</label>

<input
type="date"
name="tanggal_pinjam"
class="form-control"
required>

</div>

<div class="form-group">

<label>Tanggal Kembali</label>

<input
type="date"
name="tanggal_kembali"
class="form-control"
required>

</div>

<button class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Simpan

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>