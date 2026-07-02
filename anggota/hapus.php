<?php

include "../config/config.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$id'");

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

text:'Data anggota berhasil dihapus.',

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
<meta charset="UTF-8">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<script>

Swal.fire({

icon:'error',

title:'Gagal!',

text:'Data anggota gagal dihapus.',

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