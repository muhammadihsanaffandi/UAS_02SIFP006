<?php

include "../config/config.php";

$id = $_GET['id'];

/* Ambil data peminjaman */

$q = mysqli_query($conn,"SELECT * FROM peminjaman WHERE id_pinjam='$id'");
$data = mysqli_fetch_assoc($q);

/* Jika status masih Dipinjam, kembalikan stok */

if($data['status']=="Dipinjam"){

    mysqli_query($conn,"
    UPDATE buku
    SET stok=stok+1
    WHERE id_buku='$data[id_buku]'
    ");

}

/* Hapus transaksi */

$hapus = mysqli_query($conn,"
DELETE FROM peminjaman
WHERE id_pinjam='$id'
");

if($hapus){

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

title:'Berhasil!',

text:'Data peminjaman berhasil dihapus.',

confirmButtonColor:'#153759'

}).then(()=>{

window.location='index.php';

});

</script>

</body>

</html>

<?php

}else{

echo "Gagal";

}

?>