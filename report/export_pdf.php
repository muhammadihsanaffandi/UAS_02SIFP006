<?php

require('../fpdf/fpdf.php');
include "../config/config.php";

$where="";

if(!empty($_GET['awal']) && !empty($_GET['akhir'])){

    $awal=$_GET['awal'];
    $akhir=$_GET['akhir'];

    $where="WHERE tanggal_pinjam BETWEEN '$awal' AND '$akhir'";

}

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'LAPORAN PEMINJAMAN BUKU',0,1,'C');
$pdf->Ln(5);


$pdf->SetFont('Arial','B',11);

$pdf->Cell(10,10,'No',1,0,'C');
$pdf->Cell(70,10,'Judul Buku',1,0,'C');
$pdf->Cell(50,10,'Anggota',1,0,'C');
$pdf->Cell(35,10,'Tgl Pinjam',1,0,'C');
$pdf->Cell(35,10,'Tgl Kembali',1,0,'C');
$pdf->Cell(35,10,'Status',1,1,'C');

$pdf->SetFont('Arial','',10);

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

$pdf->Cell(10,10,$no++,1,0,'C');
$pdf->Cell(70,10,$data['judul'],1,0);
$pdf->Cell(50,10,$data['nama'],1,0);
$pdf->Cell(35,10,$data['tanggal_pinjam'],1,0,'C');
$pdf->Cell(35,10,$data['tanggal_kembali'],1,0,'C');
$pdf->Cell(35,10,$data['status'],1,1,'C');

}

$pdf->Output("I","Laporan_Peminjaman.pdf");

?>