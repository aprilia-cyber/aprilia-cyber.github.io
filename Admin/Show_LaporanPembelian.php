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

$query=mysql_query("select pembelian.Tgl_Pembelian,barang.Nama,detail_pembelian.Harga_Beli,Byk_Beli,(detail_pembelian.Harga_Beli*detail_pembelian.Byk_Beli) as Total from pembelian,detail_pembelian,barang where pembelian.ID=detail_pembelian.ID_Pembelian and barang.ID=detail_pembelian.ID_Barang");

$T=mysql_query("select SUM(detail_pembelian.Harga_Beli*detail_pembelian.Byk_Beli) as Total from detail_pembelian");
$Total=mysql_fetch_array($T);

echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
<form action="Search_LaporanPembelian.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Laporan Pembelian Barang </font></h5>
Masukkan Tanggal Pembelian : <br />
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
  </select><input type="submit" name="submit" value="Cari" />
<br />
<br>

<table width="1277" height="96" border="0" align="center">
  <tr>
    <td width="647" height="92"><table width="838" height="162" border="0" align="center" frame="below">
      <tr bgcolor="#00CCFF">
        <td width="182" height="49" align="center"><font size="3"><b>TANGGAL</b></font> </td>
        <td width="279" align="center"><font size="3"><b> NAMA BARANG </b></font></td>
        <td width="132" align="center"><font size="3"><b> HARGA BELI </b></font></td>
		<td width="94" align="center"><font size="3"><b> BANYAK BELI </b></font></td>
		<td width="129" align="center"><font size="3"><b> TOTAL </b></font></td>
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
        <td height="20" align="center"><?php echo"$tampil[0]"; ?> </td>
        <td align="center"><?php echo"$tampil[1]"; ?> </td>
        <td align="center"><?php echo"$tampil[2]"; ?> </td>
		<td align="center"><?php echo"$tampil[3]"; ?> </td>
		<td align="right"><?php echo"$tampil[4]"; ?> </td>
      </tr>
      <?php
$i++;
}
?>
<tr>
<td colspan="4" align="center"> <font size="5"> <br />Total Pembelian Barang </font></td>
<td align="right"> <font size="5"><br /><?php echo"$Total[0]"; ?> </font></td>
<tr>

    </table></td>
  </tr><tr>
  <td colspan="2" align="center"> <br /> <br /><input type="submit" name="printall" value="Cetak Laporan" /> </td>
  </tr>
</table>

</form>


