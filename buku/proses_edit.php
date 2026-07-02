<?php

include "../config/config.php";

$id         = $_POST['id_buku'];
$judul      = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$kategori   = $_POST['kategori'];
$tahun      = $_POST['tahun'];
$stok       = $_POST['stok'];

$cover_lama = $_POST['cover_lama'];
$cover_baru = $cover_lama;

/* ===========================
   CEK APAKAH GANTI COVER
=========================== */

if($_FILES['cover']['name'] != ""){

    $folder = "../uploads/";

    $nama_file = time()."_".$_FILES['cover']['name'];

    $tmp = $_FILES['cover']['tmp_name'];

    move_uploaded_file($tmp,$folder.$nama_file);

    /* Hapus cover lama */

    if($cover_lama != "" && file_exists($folder.$cover_lama)){

        unlink($folder.$cover_lama);

    }

    $cover_baru = $nama_file;

}

/* ===========================
   UPDATE DATABASE
=========================== */

$query = mysqli_query($conn,"UPDATE buku SET

judul='$judul',
pengarang='$pengarang',
penerbit='$penerbit',
kategori='$kategori',
tahun='$tahun',
stok='$stok',
cover='$cover_baru'

WHERE id_buku='$id'");

if($query){

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({

icon:'success',
title:'Berhasil!',
text:'Data buku berhasil diperbarui.',
confirmButtonColor:'#153759'

}).then(()=>{

window.location='index.php';

});

</script>

</body>
</html>

<?php

}else{

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<script>

Swal.fire({

icon:'error',
title:'Gagal!',
text:'Data buku gagal diperbarui.',
confirmButtonColor:'#153759'

}).then(()=>{

history.back();

});

</script>

</body>
</html>

<?php

}

?>