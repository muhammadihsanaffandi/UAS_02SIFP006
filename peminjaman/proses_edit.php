<?php

include "../config/config.php";

$id_pinjam = $_POST['id_pinjam'];
$id_buku   = $_POST['id_buku'];
$status    = $_POST['status'];

/* Ambil status lama */

$cek = mysqli_query($conn,"SELECT status FROM peminjaman WHERE id_pinjam='$id_pinjam'");
$data = mysqli_fetch_assoc($cek);

/* Update status */

mysqli_query($conn,"
UPDATE peminjaman
SET status='$status'
WHERE id_pinjam='$id_pinjam'
");

/* Kalau berubah dari Dipinjam → Dikembalikan */

if($data['status']=="Dipinjam" && $status=="Dikembalikan"){

    mysqli_query($conn,"
    UPDATE buku
    SET stok = stok + 1
    WHERE id_buku='$id_buku'
    ");

}

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

text:'Status peminjaman berhasil diperbarui.',

confirmButtonColor:'#153759'

}).then(()=>{

window.location='index.php';

});

</script>

</body>

</html>