<?php

$base = "../";

include "../config/auth.php";
include "../config/config.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Anggota | SIPERPUS</title>

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

<i class="fa-solid fa-user-plus"></i>

Tambah Anggota

</h1>

<p>Masukkan data anggota baru.</p>

</div>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form action="proses_tambah.php" method="POST">

<div class="form-group">

<label>Nama Lengkap</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="form-group">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
rows="4"
required></textarea>

</div>

<div class="form-group">

<label>No. Telepon</label>

<input
type="text"
name="telepon"
class="form-control"
required>

</div>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<button
type="submit"
class="btn btn-primary">

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