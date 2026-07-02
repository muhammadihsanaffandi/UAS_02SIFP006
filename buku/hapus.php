<?php

include "../config/config.php";

$id = $_GET['id'];

/* Ambil data cover */

$query = mysqli_query($conn,"SELECT cover FROM buku WHERE id_buku='$id'");

$data = mysqli_fetch_assoc($query);

/* Hapus cover */

if($data['cover']!=""){

    $file="../uploads/".$data['cover'];

    if(file_exists($file)){

        unlink($file);

    }

}

/* Hapus data */

$hapus=mysqli_query($conn,"DELETE FROM buku WHERE id_buku='$id'");

if($hapus){

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

text:'Data buku berhasil dihapus.',

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

text:'Data gagal dihapus.',

confirmButtonColor:'#153759'

}).then(()=>{

window.location='index.php';

});

</script>

</body>

</html>

<?php

}

?>