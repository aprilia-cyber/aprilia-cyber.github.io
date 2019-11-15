<?php
require('fpdf.php');
require('koneksi.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(70,10,'',0);
$pdf->Cell(100,10,'DATA BARANG',0);
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,8,'ID',0);
	$pdf->Cell(80,8,'NAMA',0);
	$pdf->Cell(40,8,'HARGA',0);
	$pdf->Cell(25,8,'STOK',0);
	$pdf->Cell(25,8,'KET.',0);
$pdf->Ln(8);
$pdf->SetFont('Arial','',8);
$query=mysql_query("select*from barang order by ID");
$i=0;
while($tampil=mysql_fetch_row($query))
{
	if($i%2==0)
		{
		$color="#FFFFFF";
		}
	else
		{
		$color="#DADADA";
		}
	$pdf->Cell(15,8,$tampil[0],0);
	$pdf->Cell(80,8,$tampil[1],0);
	$pdf->Cell(40,8,$tampil[2],0);
	$pdf->Cell(25,8,$tampil[3],0);
	$pdf->Cell(25,8,$tampil[4],0);
	$pdf->Ln(8);
}
$pdf->output();
?>