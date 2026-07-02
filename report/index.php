<?php

$base="../";

include "../config/auth.php";
include "../config/config.php";

$where="";

if(isset($_GET['filter'])){

    $awal=$_GET['awal'];
    $akhir=$_GET['akhir'];

    $where="WHERE tanggal_pinjam BETWEEN '$awal' AND '$akhir'";

}

$query=mysqli_query($conn,"
SELECT
peminjaman.*,
buku.judul,
anggota.nama
FROM peminjaman
JOIN buku ON peminjaman.id_buku=buku.id_buku
JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
$where
ORDER BY tanggal_pinjam DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Laporan Peminjaman</title>

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

<h1>

<i class="fa-solid fa-chart-column"></i>

Laporan Peminjaman

</h1>

<div style="display:flex;gap:10px;">

<button onclick="window.print()" class="btn btn-success">

<i class="fa-solid fa-print"></i>

Print

</button>

<a href="export_pdf.php?awal=<?= isset($_GET['awal']) ? $_GET['awal'] : ''; ?>&akhir=<?= isset($_GET['akhir']) ? $_GET['akhir'] : ''; ?>"
class="btn btn-danger">

<i class="fa-solid fa-file-pdf"></i>

Export PDF

</a>

<a href="export_excel.php?awal=<?= isset($_GET['awal']) ? $_GET['awal'] : ''; ?>&akhir=<?= isset($_GET['akhir']) ? $_GET['akhir'] : ''; ?>"
class="btn btn-success">

<i class="fa-solid fa-file-excel"></i>

Export Excel

</a>

</div>

<i class="fa-solid fa-print"></i>

Print

</button>

</div>

<div class="table-card">

<form method="GET" action="index.php">

<div style="display:flex;gap:15px;align-items:end;flex-wrap:wrap;">

<div>

<label>Tanggal Awal</label>

<input
type="date"
name="awal"
class="form-control"
required>

</div>

<div>

<label>Tanggal Akhir</label>

<input
type="date"
name="akhir"
class="form-control"
required>

</div>

<div>

<button
type="submit"
name="filter"
class="btn btn-primary">

Filter

</button>

</div>

</div>

</form>

</div>

<div class="table-card">

<table>

<thead>

<tr>

<th>No</th>

<th>Buku</th>

<th>Anggota</th>

<th>Tgl Pinjam</th>

<th>Tgl Kembali</th>

<th>Status</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

while($data=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $data['judul']; ?></td>

<td><?= $data['nama']; ?></td>

<td><?= $data['tanggal_pinjam']; ?></td>

<td><?= $data['tanggal_kembali']; ?></td>

<td><?= $data['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>

</body>

</html>

