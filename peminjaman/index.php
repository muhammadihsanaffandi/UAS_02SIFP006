<?php

$base="../";

include "../config/auth.php";
include "../config/config.php";

$query=mysqli_query($conn,"
SELECT
peminjaman.*,
buku.judul,
anggota.nama
FROM peminjaman
JOIN buku ON peminjaman.id_buku=buku.id_buku
JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
ORDER BY id_pinjam DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Data Peminjaman</title>

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

<i class="fa-solid fa-book-open-reader"></i>

Data Peminjaman

</h1>

<p>Kelola transaksi peminjaman buku.</p>

</div>

<a href="tambah.php" class="btn btn-primary">

<i class="fa-solid fa-plus"></i>

Tambah Peminjaman

</a>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>No</th>

<th>Judul Buku</th>

<th>Nama Anggota</th>

<th>Tanggal Pinjam</th>

<th>Tanggal Kembali</th>

<th>Status</th>

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

<td><?= $data['judul']; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['tanggal_pinjam']; ?></td>

<td><?= $data['tanggal_kembali']; ?></td>

<td>

<?php

if($data['status']=="Dipinjam"){

echo "<span style='color:#F59E0B;font-weight:bold;'>Dipinjam</span>";

}else{

echo "<span style='color:#22C55E;font-weight:bold;'>Dikembalikan</span>";

}

?>

</td>

<td>

<a href="edit.php?id=<?= $data['id_pinjam']; ?>" class="btn btn-warning">

<i class="fa-solid fa-pen"></i>

</a>

<a href="hapus.php?id=<?= $data['id_pinjam']; ?>" class="btn btn-danger btn-hapus">

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

const url=this.href;

Swal.fire({

title:'Yakin?',

text:'Data peminjaman akan dihapus!',

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