<?php
require('fpdf.php');
require('koneksi.php');

$Tahun = $_POST['Tahun'];
$Bulan = $_POST['Bulan'];
$Tanggal = $_POST['Tanggal'];

$query=mysql_query("select pemesanan.Tgl_Pesan,barang.Nama,detail_pemesanan.Harga,Byk_Pesan,(detail_pemesanan.Harga*detail_pemesanan.Byk_Pesan) as Total from pemesanan,detail_pemesanan,barang where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.Tgl_Pesan like'$Tahun-$Bulan-$Tanggal%'");

$T=mysql_query("select SUM(detail_pemesanan.Harga*detail_pemesanan.Byk_Pesan) as Total from pemesanan,detail_pemesanan,barang where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.Tgl_Pesan like'$Tahun-$Bulan-$Tanggal%'");
$Total=mysql_fetch_array($T);

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(75,10,'',0);
$pdf->Cell(100,10,'Micelle Shop',0);
$pdf->Ln(12);
$pdf->Cell(37,10,'',0);
$pdf->Cell(100,10,'LAPORAN PEMESANAN BARANG',0);
$pdf->Ln(12);
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
	$pdf->Cell(6,8,'',0);
	$pdf->Cell(15,8,'TANGGAL',0);
	$pdf->Cell(35,8,'',0);
	$pdf->Cell(19,8,'NAMA BARANG',0);
	$pdf->Cell(30,8,'',0);
	$pdf->Cell(1,8,'HARGA',0);
	$pdf->Cell(30,8,'',0);
	$pdf->Cell(8,8,'BANYAK PESAN',0);
	$pdf->Cell(30,8,'',0);
	$pdf->Cell(40,8,'TOTAL',0);
$pdf->Ln(11);
$pdf->SetFont('Arial','',10);


while($tampil=mysql_fetch_row($query))
{
	$pdf->Cell(15,8,$tampil[0],0);
	$pdf->Cell(25,8,'',0);
	$pdf->Cell(39,8,$tampil[1],0);
	$pdf->Cell(35,8,'',0);
	$pdf->Cell(33,8,$tampil[2],0);
	$pdf->Cell(1,8,'',0);
	$pdf->Cell(27,8,$tampil[3],0);
	$pdf->Cell(1,8,'',0);
	$pdf->Cell(20,8,$tampil[4],0);
	$pdf->Ln(8);
}



$pdf->Ln(8);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(50,10,'Total Pembelian',0);
$pdf->Cell(55,10,'',0);
$pdf->Cell(65,10,'Rp',0);
$pdf->Cell(1,10,'',0);
$pdf->Cell(0,10,$Total[0],0);
$pdf->output();
?>
