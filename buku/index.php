<?php

$base = "../";

include "../config/auth.php";
include "../config/config.php";

$query = mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku DESC");

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Buku | SIPERPUS</title>

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
                    <i class="fa-solid fa-book"></i>
                    Data Buku
                </h1>

                <p>
                    Kelola seluruh koleksi buku perpustakaan.
                </p>

            </div>

            <a href="tambah.php" class="btn btn-primary">

                <i class="fa-solid fa-plus"></i>

                Tambah Buku

            </a>

        </div>

        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Cari judul buku...">

        </div>

        <div class="table-card">

            <table>

                <thead>

                <tbody>

                    <?php

                        if(mysqli_num_rows($query) > 0){

                        $no=1;

                    while($data=mysqli_fetch_assoc($query)){

                    ?>

                    <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $data['kode_buku']; ?></td>

                    <td>

                    <?php

                    if($data['cover']==""){

                    echo "-";

                    }else{

                ?>

            <img
                src="../uploads/<?= $data['cover']; ?>"
        width="55">

        <?php } ?>

            </td>

        <td><?= $data['judul']; ?></td>

        <td><?= $data['pengarang']; ?></td>

        <td><?= $data['kategori']; ?></td>

        <td>

<?php

if($data['stok'] > 10){

    echo "<span class='badge badge-success'>".$data['stok']."</span>";

}elseif($data['stok'] > 0){

    echo "<span class='badge badge-warning'>".$data['stok']."</span>";

}else{

    echo "<span class='badge badge-danger'>0</span>";

}

?>

</td>

    <td>

            <a href="edit.php?id=<?= $data['id_buku']; ?>" class="btn btn-warning">

            <i class="fa-solid fa-pen"></i>

        </a>

            <a href="hapus.php?id=<?= $data['id_buku']; ?>"
            class="btn btn-danger btn-hapus">

            <i class="fa-solid fa-trash"></i>

        </a>

    </td>

</tr>

            <?php

     }

        }else{

        ?>

        <tr>

        <td colspan="8" style="text-align:center; padding:30px;">

        Belum ada data buku.

     </td>

     </tr>

    <?php } ?>

</tbody>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="8" style="text-align:center;padding:35px;">

                            Belum ada data buku.

                        </td>

                    </tr>

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

        const url=this.getAttribute('href');

        Swal.fire({

            title:'Yakin?',

            text:'Data buku akan dihapus!',

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