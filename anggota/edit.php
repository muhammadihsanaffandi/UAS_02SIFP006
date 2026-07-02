<?php

$base="../";

include "../config/auth.php";
include "../config/config.php";

$id=$_GET['id'];

$query=mysqli_query($conn,"SELECT * FROM anggota WHERE id_anggota='$id'");
$data=mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Edit Anggota</title>

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

<h1><i class="fa-solid fa-user-pen"></i> Edit Anggota</h1>

<a href="index.php" class="btn btn-warning">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

</div>

<div class="table-card">

<form action="proses_edit.php" method="POST">

<input type="hidden" name="id_anggota" value="<?= $data['id_anggota']; ?>">

<div class="form-group">

<label>Nama</label>

<input type="text"
name="nama"
class="form-control"
value="<?= $data['nama']; ?>"
required>

</div>

<div class="form-group">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
rows="4"
required><?= $data['alamat']; ?></textarea>

</div>

<div class="form-group">

<label>Telepon</label>

<input
type="text"
name="telepon"
class="form-control"
value="<?= $data['telepon']; ?>"
required>

</div>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $data['email']; ?>"
required>

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