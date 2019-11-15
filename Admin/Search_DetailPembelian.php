<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language = "javascript">
alert("Maaf anda harus login terlebih dahulu");
document.location="Login.php";
</script>
<?php
exit;
}
?>

<?php 
include "koneksi.php";
$Tgl=$_POST['Tgl'];
$Bln=$_POST['Bln'];
$Thn=$_POST['Thn'];

$query=mysql_query("select detail_pembelian.ID,ID_Pembelian,pegawai.Nama,barang.Nama,detail_pembelian.Harga_Beli,Harga_Jual,Byk_Beli,pembelian.Tgl_Pembelian from pegawai,barang,detail_pembelian,pembelian where barang.ID=detail_pembelian.ID_Barang and pembelian.ID=detail_pembelian.ID_Pembelian and pegawai.ID=pembelian.ID_Pegawai and pembelian.Tgl_Pembelian like'$Thn-$Bln-$Tgl%' order by detail_pembelian.ID");

echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>

</p>
<form action="Search_DetailPembelian.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#550002"> Detail Pembelian </font></h5>
Masukkan Tanggal Pembelian : 

<select name="Tgl">
		<?php
		include "koneksi.php";
		echo"<option value='%'> - </option>";
		
		$t=0;
		for($s=1; $s<=9; $s++)
			{
			echo"<option value='$t$s'> $t$s</option>";
			}
		for($st=10; $st<=31; $st++)
			{
			echo"<option value='$st'> $st</option>";
			}
		
		?>
  </select>
<select name="Bln">
		<?php
		echo"<option value='%'> - </option>
				<option value='01'> Januari </option>
				<option value='02'> Februari </option>
				<option value='03'> Maret </option>
				<option value='04'> April </option>
				<option value='05'> Mei </option>
				<option value='06'> Juni </option>
				<option value='07'> Juli </option>
				<option value='08'> Agustus </option>
				<option value='09'> September </option>
				<option value='10'> Oktober </option>
				<option value='11'> Nopember </option>
				<option value='12'> Desember </option>";
		?>
  </select>
<select name="Thn">
		<?php
		include "koneksi.php";
		echo"<option value='%'> - </option>";
		$mulai=1998;
		$querythn=mysql_query("select year(curdate())");
		$thn=mysql_fetch_array($querythn);
		for($mulai=1998; $mulai<=$thn[0]; $mulai++)
		{
		echo"<option value='$mulai'> $mulai </option>";
		}
		?>
  </select>
<input type="submit" name="submit" value="Search" />
<br /> 
<br />
<br />
<table width="1167" border="0" align="center" frame="below">
<tr bgcolor="#FF6666">
<td width="34" height="45" align="center"><font size="3"><b> ID</b></font> </td>
<td width="102" align="center"><font size="3"><b> ID PEMBELIAN </b></font></td>
<td width="192" align="center"><font size="3"><b> NAMA PEGAWAI </b></font> </td>
<td width="308" align="center"> <font size="3"><b> NAMA BARANG </b></font></td>
<td width="114" align="center"><font size="3"><b> HARGA BELI </b></font></td>
<td width="114" align="center"><font size="3"><b> HARGA JUAL </b></font></td>
<td width="82" align="center"> <font size="3"><b> BANYAK BELI </b></font></td>
<td width="149" align="center"><font size="3"><b> TANGGAL PEMBELIAN </b></font></td>
<td width="34" align="center"></td>
</tr>
<?php
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
?>
<tr bgcolor= <?php echo"$color"; ?> >
<td align="center" bgcolor="#FF6666"> <?php echo"$tampil[0]"; ?> </td>
<td align="center"> <?php echo"$tampil[1]"; ?> </td>
<td align="center"> <?php echo"$tampil[2]"; ?> </td>
<td align="center"> <?php echo"$tampil[3]"; ?> </td>
<td align="center"> <?php echo"$tampil[4]"; ?> </td>
<td align="center"> <?php echo"$tampil[5]"; ?> </td>
<td align="center"> <?php echo"$tampil[6]"; ?> </td>
<td align="center"> <?php echo"$tampil[7]"; ?> </td>
<td align="center"> <?php echo"<a href ='formedit_DetailPembelian.php?id=$tampil[0]'> Edit </a>"; ?> </td>
</tr>

<?php
$i++;
}
?>
</table>
<h4 align="right"><a href="forminput_DetailPembelian.php"> + Tambah Pembelian Barang </a></h4>
</form>