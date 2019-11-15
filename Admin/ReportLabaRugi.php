<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu");
document.location="Login.php";
</script>
<?php
exit;
}
?>


		
<?php
include "koneksi.php";
$Bln=$_POST['Bulan'];
$Thn=$_POST['Tahun'];

if($_POST['submit'])
{
$Beli=mysql_query("select SUM(detail_pembelian.Harga_Beli*detail_pembelian.Byk_Beli) as Total from pembelian,detail_pembelian,barang where pembelian.ID=detail_pembelian.ID_Pembelian and barang.ID=detail_pembelian.ID_Barang and pembelian.Tgl_Pembelian like'$Thn-$Bln%'");
$TBeli=mysql_fetch_array($Beli);

$Pesan=mysql_query("select SUM(detail_pemesanan.Harga*detail_pemesanan.Byk_Pesan) as Total from pemesanan,detail_pemesanan,barang where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.Tgl_Pesan like'$Thn-$Bln%'");
$TPesan=mysql_fetch_array($Pesan);



echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
<form action="ReportLabaRugi.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Laporan Laba Rugi  <br>
<?php   
if($Bln=='%'){echo"";}
else if($Bln=='01'){echo"Januari";}
else if($Bln=='02'){echo"Februari";}
else if($Bln=='03'){echo"Maret";}
else if($Bln=='04'){echo"April";}
else if($Bln=='05'){echo"Mei";}
else if($Bln=='06'){echo"Juni";}
else if($Bln=='07'){echo"Juli";}
else if($Bln=='08'){echo"Agustus";}
else if($Bln=='09'){echo"September";}
else if($Bln=='10'){echo"Oktober";}
else if($Bln=='11'){echo"Nopember";}
else if($Bln=='12'){echo"Desember";}
else{echo"Bulan Tak Terdefinisi";}
 echo" ";  
if($Thn=='%'){echo"";}else{echo"$Thn";} ?>
</font></h5>
<hr>
<br />
<br>
<table width="579" height="162" border="0" align="center" frame="below">
      <tr>
        <td width="322" height="49" align="center"><font size="3"><b>TOTAL PEMBELIAN</b></font> </td>
        <td width="247" align="center"><?php echo"Rp. $TBeli[0]"; ?></td>
      </tr>
      <tr>
        <td height="20" align="center"><font size="3"><b>TOTAL PEMESANAN</b></font> </td>
        <td align="center"><?php echo" Rp. $TPesan[0]"; ?> </td>
 
      </tr>
	  <?php
	$Total="$TPesan[0]"-"$TBeli[0]";
	if($Total<0)
	{
	$ket="Kerugian";
	$Total=$Total*-1;
	}
	else
	{
	$ket="Keuntungan";
	}
	?>
<tr>
<td align="center" colspan="2"> <font size="+2"> <br />Anda mendapat<?php echo" $ket "; ?> sebesar <b><?php echo" Rp. $Total";?></b></font></td>
<tr>

  </table>

</form>
<?php
}
else if($_POST['printall'])
{
header("location:ReportPemesananAll.php");
}
?>
<form action="ReportPemesanan.php" method="post">
<table align="center">
<tr>
<td>
<label>
  <input name="Tanggal" type="hidden" id="Tanggal" value="<?php echo $Tgl; ?>"/>
  </label>
  <label>
  <input name="Bulan" type="hidden" id="Bulan" value="<?php echo $Bln ; ?>"/>
  </label>
  <label>
  <input name="Tahun" type="hidden" id="Tahun" value="<?php echo $Thn ; ?>"/>
  </label>
  <input type="submit" name="print" value="Cetak Laporan" />
  </td></tr>
  </table>
</form>
