<?php

include "../config/config.php";

$id_buku=$_POST['id_buku'];
$id_anggota=$_POST['id_anggota'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];

mysqli_query($conn,"INSERT INTO peminjaman
(id_buku,id_anggota,tanggal_pinjam,tanggal_kembali,status)
VALUES
('$id_buku','$id_anggota','$tanggal_pinjam','$tanggal_kembali','Dipinjam')");

mysqli_query($conn,"UPDATE buku
SET stok=stok-1
WHERE id_buku='$id_buku'");

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({

icon:'success',

title:'Berhasil',

text:'Peminjaman berhasil ditambahkan.',

confirmButtonColor:'#153759'

}).then(()=>{

window.location='index.php';

});

</script>

</body>

</html>