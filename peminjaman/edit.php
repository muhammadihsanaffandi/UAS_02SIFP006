<?php

$base = "../";

include "../config/auth.php";
include "../config/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT peminjaman.*, buku.judul, anggota.nama
FROM peminjaman
JOIN buku ON peminjaman.id_buku = buku.id_buku
JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
WHERE id_pinjam='$id'
");

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Edit Peminjaman</title>

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

<i class="fa-solid fa-book"></i>

Edit Peminjaman

</h1>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form action="proses_edit.php" method="POST">

<input type="hidden" name="id_pinjam" value="<?= $data['id_pinjam']; ?>">

<input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">

<div class="form-group">

<label>Buku</label>

<input
type="text"
class="form-control"
value="<?= $data['judul']; ?>"
readonly>

</div>

<div class="form-group">

<label>Anggota</label>

<input
type="text"
class="form-control"
value="<?= $data['nama']; ?>"
readonly>

</div>

<div class="form-group">

<label>Status</label>

<select name="status" class="form-control">

<option value="Dipinjam"
<?= $data['status']=="Dipinjam" ? "selected" : ""; ?>>

Dipinjam

</option>

<option value="Dikembalikan"
<?= $data['status']=="Dikembalikan" ? "selected" : ""; ?>>

Dikembalikan

</option>

</select>

</div>

<button class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Update

</button>

</form>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>