<?php

include "../config/auth.php";
include "../config/config.php";

/* ===========================
   KODE BUKU OTOMATIS
=========================== */

$query = mysqli_query($conn,"SELECT MAX(kode_buku) AS kode FROM buku");

$data = mysqli_fetch_assoc($query);

$kode = $data['kode'];

if($kode == NULL){

    $kode_baru = "BK001";

}else{

    $angka = (int) substr($kode,2);

    $angka++;

    $kode_baru = "BK".str_pad($angka,3,"0",STR_PAD_LEFT);

}

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Buku | SIPERPUS</title>

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

<div>

<h1>

<i class="fa-solid fa-book"></i>

Tambah Buku

</h1>

<p>

Lengkapi data buku yang akan ditambahkan.

</p>

</div>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form
action="proses_tambah.php"
method="POST"
enctype="multipart/form-data">

<div class="form-group">

<label>Kode Buku</label>

<input
type="text"
name="kode_buku"
class="form-control"
value="<?= $kode_baru; ?>"
readonly>

</div>

<div class="form-group">

<label>Judul Buku</label>

<input
type="text"
name="judul"
class="form-control"
required>

</div>

<div class="form-group">

<label>Pengarang</label>

<input
type="text"
name="pengarang"
class="form-control"
required>

</div>

<div class="form-group">

<label>Penerbit</label>

<input
type="text"
name="penerbit"
class="form-control"
required>

</div>

<div class="form-group">

<label>Kategori</label>

<input
type="text"
name="kategori"
class="form-control"
required>

</div>

<div class="form-group">

<label>Tahun Terbit</label>

<input
type="number"
name="tahun"
class="form-control"
min="1900"
max="<?= date('Y'); ?>"
required>

</div>

<div class="form-group">

<label>Stok</label>

<input
type="number"
name="stok"
class="form-control"
required>

</div>

<div class="form-group">

<label>Cover Buku</label>

<input
type="file"
name="cover"
class="form-control">

</div>

<button
type="submit"
class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Simpan Buku

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>