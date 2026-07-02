<?php

include "../config/config.php";

$kode_buku  = $_POST['kode_buku'];
$judul      = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$kategori   = $_POST['kategori'];
$tahun      = $_POST['tahun'];
$stok       = $_POST['stok'];

/* ===========================
   UPLOAD COVER
=========================== */

$cover = "";

if($_FILES['cover']['name'] != ""){

    $folder = "../uploads/";

    $nama_file = time()."_".$_FILES['cover']['name'];

    $tmp = $_FILES['cover']['tmp_name'];

    move_uploaded_file($tmp,$folder.$nama_file);

    $cover = $nama_file;

}

/* ===========================
   SIMPAN DATA
=========================== */

$query = mysqli_query($conn,"INSERT INTO buku(

    kode_buku,
    judul,
    pengarang,
    penerbit,
    kategori,
    tahun,
    stok,
    cover

) VALUES (

    '$kode_buku',
    '$judul',
    '$pengarang',
    '$penerbit',
    '$kategori',
    '$tahun',
    '$stok',
    '$cover'

)");

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

    text:'Data buku berhasil ditambahkan.',

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

    text:'Data buku gagal disimpan.',

    confirmButtonColor:'#153759'

}).then(()=>{

    history.back();

});

</script>

</body>

</html>

<?php

}