<?php

include "../config/config.php";

$id=$_POST['id_anggota'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];
$email=$_POST['email'];

$query=mysqli_query($conn,"UPDATE anggota SET

nama='$nama',
alamat='$alamat',
telepon='$telepon',
email='$email'

WHERE id_anggota='$id'");

if($query){
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
    text:'Data anggota berhasil diperbarui.',
    confirmButtonColor:'#153759'
}).then(()=>{
    window.location='index.php';
});

</script>

</body>
</html>

<?php
}