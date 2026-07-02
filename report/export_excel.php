<?php

include "../config/config.php";

$where="";

if(!empty($_GET['awal']) && !empty($_GET['akhir'])){

$awal=$_GET['awal'];

$akhir=$_GET['akhir'];

$where="WHERE tanggal_pinjam BETWEEN '$awal' AND '$akhir'";

}

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Peminjaman.xls");

echo "<h2>Laporan Peminjaman Buku</h2>";

if(!empty($_GET['awal']) && !empty($_GET['akhir'])){

    echo "<b>Periode : $awal s/d $akhir</b><br><br>";
}
    
?>

<table border="1">

<tr style="background:#153759;color:white;">

<th>No</th>
<th>Judul Buku</th>
<th>Anggota</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>

</tr>

<?php

$no=1;

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

</table>