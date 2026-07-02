<?php

include "../config/auth.php";
include "../config/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM buku WHERE id_buku='$id'");

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Buku | SIPERPUS</title>

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

<i class="fa-solid fa-pen"></i>

Edit Buku

</h1>

<p>

Perbarui informasi buku.

</p>

</div>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form
action="proses_edit.php"
method="POST"
enctype="multipart/form-data">

<input
type="hidden"
name="id_buku"
value="<?= $data['id_buku']; ?>">

<input
type="hidden"
name="cover_lama"
value="<?= $data['cover']; ?>">

<div class="form-group">

<label>Kode Buku</label>

<input
type="text"
class="form-control"
value="<?= $data['kode_buku']; ?>"
readonly>

</div>

<div class="form-group">

<label>Judul Buku</label>

<input
type="text"
name="judul"
class="form-control"
value="<?= $data['judul']; ?>"
required>

</div>

<div class="form-group">

<label>Pengarang</label>

<input
type="text"
name="pengarang"
class="form-control"
value="<?= $data['pengarang']; ?>"
required>

</div>

<div class="form-group">

<label>Penerbit</label>

<input
type="text"
name="penerbit"
class="form-control"
value="<?= $data['penerbit']; ?>"
required>

</div>

<div class="form-group">

<label>Kategori</label>

<input
type="text"
name="kategori"
class="form-control"
value="<?= $data['kategori']; ?>"
required>

</div>

<div class="form-group">

<label>Tahun</label>

<input
type="number"
name="tahun"
class="form-control"
value="<?= $data['tahun']; ?>"
required>

</div>

<div class="form-group">

<label>Stok</label>

<input
type="number"
name="stok"
class="form-control"
value="<?= $data['stok']; ?>"
required>

</div>

<?php if($data['cover']!=""){ ?>

<div class="form-group">

<label>Cover Saat Ini</label>

<br><br>

<img src="../uploads/<?= $data['cover']; ?>" width="120">

</div>

<?php } ?>

<div class="form-group">

<label>Ganti Cover</label>

<input
type="file"
name="cover"
class="form-control">

</div>

<button
type="submit"
class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Update Buku

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>