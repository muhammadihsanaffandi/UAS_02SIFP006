<?php

$base = "../";

include "../config/auth.php";
include "../config/config.php";

$query = mysqli_query($conn,"SELECT * FROM anggota ORDER BY id_anggota DESC");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Anggota | SIPERPUS</title>

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

<i class="fa-solid fa-users"></i>

Data Anggota

</h1>

<p>

Kelola data anggota perpustakaan.

</p>

</div>

<a href="tambah.php" class="btn btn-primary">

<i class="fa-solid fa-plus"></i>

Tambah Anggota

</a>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Alamat</th>

<th>Telepon</th>

<th>Email</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['alamat']; ?></td>

<td><?= $data['telepon']; ?></td>

<td><?= $data['email']; ?></td>

<td>

<a href="edit.php?id=<?= $data['id_anggota']; ?>" class="btn btn-warning">

<i class="fa-solid fa-pen"></i>

</a>

<a href="hapus.php?id=<?= $data['id_anggota']; ?>" class="btn btn-danger btn-hapus">

<i class="fa-solid fa-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.btn-hapus').forEach(function(btn){

btn.addEventListener('click',function(e){

e.preventDefault();

const url=this.getAttribute('href');

Swal.fire({

title:'Yakin?',

text:'Data anggota akan dihapus!',

icon:'warning',

showCancelButton:true,

confirmButtonColor:'#153759',

cancelButtonColor:'#EF4444',

confirmButtonText:'Ya, Hapus',

cancelButtonText:'Batal'

}).then((result)=>{

if(result.isConfirmed){

window.location=url;

}

});

});

});

</script>

</body>

</html>