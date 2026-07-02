<?php

include "../config/config.php";

$nama     = $_POST['nama'];
$alamat   = $_POST['alamat'];
$telepon  = $_POST['telepon'];
$email    = $_POST['email'];

$query = mysqli_query($conn,"INSERT INTO anggota
(nama,alamat,telepon,email)
VALUES
('$nama','$alamat','$telepon','$email')");

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

text:'Data anggota berhasil ditambahkan.',

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

text:'Data anggota gagal ditambahkan.',

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